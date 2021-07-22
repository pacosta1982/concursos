<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageLevelResume extends Model
{
    protected $fillable = [
        'resume_id',
        'language_id',
        'language_level_id',
        'certificate',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['language_level', 'language'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/language-level-resumes/' . $this->getKey());
    }

    public function language_level()
    {
        return $this->belongsTo('App\Models\LanguageLevel');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
