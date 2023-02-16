<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'

    ];

    protected $table = 'admin_users';


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    //protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/usersa/' . $this->getKey());
    }
}
