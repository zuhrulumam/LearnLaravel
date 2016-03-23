<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $fillable = ['blog_title', 'blog_content', 'slug'];
    protected $guarded = ['blog_id'];
    
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';

}
