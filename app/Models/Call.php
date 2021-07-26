<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'description',
        'call_type_id',
        'position_id',
        'company_id',
        'start',
        'end',
        'footnote',
    ];


    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'is_admin'];
    protected $with = ['CallType', 'Position', 'Company'];

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
