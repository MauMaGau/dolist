<?php

class Post extends \Eloquent {
	protected $fillable = [];
    protected $guarded = ['id'];

    public function resource()
    {
        return $this->hasOne('Resource', 'id', 'resource_id');
    }
}