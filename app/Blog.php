<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $fillable = ['blog_title', 'blog_content', 'slug'];
    protected $guarded = ['blog_id'];
    
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    
    public function comments() {
        return $this->hasMany('App\Comments', 'comment_blog_id', 'blog_id');
    }

}
