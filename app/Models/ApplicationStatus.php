<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $fillable = [
        'task_id',
        'status_id',
        'user_id',
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['status', 'user'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/application-statuses/' . $this->getKey());
    }

    public function status()
    {
        return $this->hasOne(WorkflowState::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(AdminUser::class);
    }
}
