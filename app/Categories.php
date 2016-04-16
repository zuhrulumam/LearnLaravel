<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model {

    protected $guarded = ["category_id"];
    protected $fillable = ["category_name", "category_slug", "category_description"];
    
    protected $table = "categories";
    protected $primaryKey = "category_id";
    
    public function posts() {
        //belongToMany($related, $table_transaction, $this_id in table_transaction, $related_id in table_transaction)
        return $this->belongsToMany("App\Blog", "category_relation", 'relation_category_id' ,'relation_blog_id');
    }
}
