<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
        
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $primaryKey = "media_id";
    
    protected $guarded = ['id_media'];
    protected $fillable = ['media_description', 'media_name', 'media_slug'];
}
