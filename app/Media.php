<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $primaryKey = "id_media";
    
    protected $guarded = ['id_media'];
    protected $fillable = ['media_description', 'media_name'];
}
