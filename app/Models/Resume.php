<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'names',
        'last_names',
        'government_id',
        'birthdate',
        'gender',
        'nationality',
        'address',
        'neighborhood',
        'phone',
        'email',
        'created_by',

    ];


    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['academic', 'languages', 'work', 'disability', 'ethnic'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/resumes/' . $this->getKey());
    }

    public function academic()
    {
        return $this->hasMany(AcademicTraining::class);
    }

    public function languages()
    {
        return $this->hasMany(LanguageLevelResume::class);
    }

    public function work()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function disability()
    {
        return $this->hasMany(DisabilityResume::class);
    }

    public function ethnic()
    {
        return $this->hasMany(EthnicResume::class);
    }
}
