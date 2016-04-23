<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable= ['comment_blog_id', 'comment_slug', 'comment_content',  'comment_created_by', 'status', 'email'];
            
    
    protected $primaryKey = 'comment_id';
    
    public function blog() {
        return $this->belongsTo('App\Blog', 'comment_blog_id');
    }
}
