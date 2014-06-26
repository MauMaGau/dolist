<?php

class Resource extends \Eloquent {
    protected $fillable = [];
	protected $guarded = ['id'];

    public function Post()
    {
        return $this->belongsTo('Post');
    }
}