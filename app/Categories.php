<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Categories extends Model {
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ["category_id"];
    protected $fillable = ["category_name", "category_slug", "category_description"];
    
    protected $table = "categories";
    protected $primaryKey = "category_id";
    
    public function posts() {
        //belongToMany($related, $table_transaction, $this_id in table_transaction, $related_id in table_transaction)
        return $this->belongsToMany("App\Blog", "category_relation", 'relation_category_id' ,'relation_blog_id');
    }
    
    protected static function boot() {
        parent::boot();

        static::deleting(function($category) {
           
            if ($category->forceDeleting) {
                $category->posts()->detach();
            } else {                
                CatRelation::where('relation_category_id', $category->category_id)
                    ->update(['deleted_at'=> date("Y-m-d H:i:s")]);
//                return 
            }

        });
    }
}
