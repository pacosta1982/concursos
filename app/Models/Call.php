<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Call extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    protected $fillable = [
        'description',
        'call_type_id',
        'position_id',
        'company_id',
        'start',
        'end',
        'footnote',
        'vacancies',
    ];


    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'is_admin'];
    protected $with = ['CallType', 'Position', 'Company'];

    function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            //->accepts('image/*')
            ->maxNumberOfFiles(2);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        /*$this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('gallery');*/
        $this->autoRegisterThumb200();
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/calls/' . $this->getKey());
    }

    public function getIsAdminAttribute()
    {
        return url('calls/' . $this->getKey());
    }

    public function CallType()
    {
        return $this->belongsTo('App\Models\CallType');
    }

    public function Position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function Company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
