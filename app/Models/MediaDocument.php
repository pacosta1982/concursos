<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaDocument extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'model_type',
        'model_id',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'size',
        'manipulations',
        'custom_properties',
        'generated_conversions',
        'responsive_images',
        'order_column',
    ];
}
