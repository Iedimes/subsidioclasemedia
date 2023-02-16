<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowNavigation extends Model
{
    protected $table = 'workflow_navigation';

    protected $fillable = [
        'workflow_state_id',
        'next_workflow_state_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['next', 'from'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/workflow-navigations/' . $this->getKey());
    }

    public function next()
    {
        return $this->hasOne(WorkflowState::class, 'id', 'next_workflow_state_id');
    }

    public function from()
    {
        //return $this->belongsTo('App\Models\WorkflowState', 'workflow_state_id', 'id');
        return $this->hasOne(WorkflowState::class, 'id', 'workflow_state_id');
    }
}
