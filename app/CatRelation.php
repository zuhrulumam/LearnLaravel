<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class CatRelation extends Model
{
    
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $table = "category_relation";
    public $timestamps = false;
    
//    public function blog(){
//        return $this->hasMany("blog", "blog_id", "relation_blog_id");
//    }
//    public function category(){
//        return $this->hasMany("categories", "category_id", "relation_category_id");
//    }
}
