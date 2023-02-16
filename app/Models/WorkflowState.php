<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowState extends Model
{
    protected $fillable = [
        'name',
        'color',
        'workflow_id',
        'isactive',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    //protected $with = ['navigation'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/workflow-states/' . $this->getKey());
    }

    public function navigation()
    {
        return $this->hasMany(WorkflowNavigation::class,  'workflow_state_id', 'workflow_id');
    }
}
