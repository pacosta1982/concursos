<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;


class Application extends Model implements HasMedia
{


    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;


    protected $fillable = [
        'code',
        'call_id',
        'resume_id',
        'data',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'data',

    ];

    protected $appends = ['resource_url','document_url'];
    protected $with = ['call', 'statuses','resume'];

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applications/' . $this->getKey());
    }

    public function call()
    {
        return $this->belongsTo('App\Models\Call');
    }

    public function resume()
    {
        return $this->belongsTo('App\Models\Resume');
    }

    public function statuses()
    {
        return $this->hasOne('App\Models\ApplicationStatus')->latest('id');
    }

    /*public function files()
    {
        return $this->getMedia('gallery');
    }*/

    public function getDocumentUrlAttribute()
    {
        //return url('/admin/document/' . $this->getKey());
        $mediaItems = $this->getMedia('gallery');
        $publicUrl = isset($mediaItems[0]) ? url($mediaItems[0]->getUrl()): '';
        return $publicUrl;
        //return 'abc';*/
    }


}
