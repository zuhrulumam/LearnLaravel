<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable= ['comment_blog_id', 'comment_slug', 'comment_content',  'comment_created_by', 'status', 'email'];
            
    
    protected $primaryKey = 'comment_id';
    
    public function blog() {
        return $this->belongsTo('App\Blog', 'comment_blog_id');
    }
}
