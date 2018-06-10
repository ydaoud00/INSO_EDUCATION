<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
	protected $fillable = ['description', 'path', 'likes', 'subject_id', 'user_id'];
  	protected $guarded = ['id'];

  	public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
