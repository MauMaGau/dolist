<?php

class PostsController extends \BaseController {

    protected $post;
    protected $resource;

    public function __construct(Post $post, Resource $resource)
    {
        $this->post = $post;
        $this->resource = $resource;
    }

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->orderBy('created_at', 'desc')->get();

        return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!Auth::check()){
            App::abort(404);
        }

        $post = $this->post;

        return View::make('posts.create', compact('post'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
        if(!Auth::check()){
            App::abort(404);
        }

		$validation = Validator::make(
            Input::except(['created_at', 'file']),
            ['title' => 'required']
        );

        if($validation->fails()) {
            return Redirect::route('posts.create')->withInput()->withErrors($validation);
        }

        $post = $this->post->create(Input::except(['file','created_at']));

        // Handle a file upload
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move(public_path('uploads'), $file->getClientOriginalName());

            $resource = $this->resource->create(
                ['relative_path'=>$file->getClientOriginalName()]
            );
            $post->resource_id = $resource->id;
            $post->save();
        }

        return Redirect::route('posts.edit', [$post->id]);
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->post->with('Resource')->find($id);

        return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(!Auth::check()){
            App::abort(404);
        }

		$post = $this->post->find($id);

        return View::make('posts.create', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!Auth::check()){
            App::abort(404);
        }

        $validation = Validator::make(
            Input::all(),
            ['title' => 'required']
        );

        if($validation->fails()) {
            return Redirect::route('posts.create')->withInput()->withErrors($validation);
        }

        $post = $this->post->find($id);
        $post->title = Input::get('title');
        $post->link = Input::get('link');
        $post->body = Input::get('body');
        $post->created_at = Input::get('created_at');
        $post->save();

        // Handle a file upload
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move(public_path('uploads'), $file->getClientOriginalName());

            $resource = $this->resource->create(
                ['relative_path'=>$file->getClientOriginalName()]
            );
            $post->resource_id = $resource->id;
            $post->save();
        }

        return Redirect::route('posts.edit', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->post->destroy($id);

        return Redirect::route('posts.index');
	}

}