<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    protected $guarded = ["category_id"];
    protected $fillable = ["category_name", "category_slug", "category_description"];
    
    protected $table = "categories";
    protected $primaryKey = "category_id";

}
