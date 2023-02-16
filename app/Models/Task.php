<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Task extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'NroExp',
        'name',
        'last_name',
        'government_id',
        'name_couple',
        'last_name_couple',
        'government_id_couple',
        'state_id',
        'city_id',
        'farm',
        'account',
        'amount',
        'workflow_id',
        'certificate_pin',
        'category_id'

    ];

    protected $connection = 'pgsql';


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['state', 'city', 'status', 'workflow', 'category', 'emitido'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tasks/' . $this->getKey());
    }

    public function state()
    {
        return $this->hasOne(State::class, 'DptoId', 'state_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'CiuId', 'city_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function status()
    {
        return $this->hasOne(ApplicationStatus::class)->latest('id');
    }

    public function emitido()
    {
        return $this->hasOne(ApplicationStatus::class)->where('status_id', 14);
    }
}
