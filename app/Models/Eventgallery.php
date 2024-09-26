<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventgallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'event_gallery_image',
    ];
}
