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
    
    public function categories() {
        return $this->belongsToMany('App\Categories', 'category_relation','relation_blog_id', 'relation_category_id');
    }

}
