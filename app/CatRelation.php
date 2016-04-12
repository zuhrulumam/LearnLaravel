<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatRelation extends Model
{
    protected $table = "category_relation";
    
//    public function blog(){
//        return $this->hasMany("blog", "blog_id", "relation_blog_id");
//    }
//    public function category(){
//        return $this->hasMany("categories", "category_id", "relation_category_id");
//    }
}
