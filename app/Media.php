<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $primaryKey = "media_id";
    
    protected $guarded = ['id_media'];
    protected $fillable = ['media_description', 'media_name', 'media_slug'];
}
