<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;*/

class Usuario extends Model /*implements HasMedia*/
{
    /*use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;*/

    protected $table = 'USUARIO';
    protected $primaryKey = 'UsuCod';
    public $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'sqlsrv';
    public $incrementing = false;

    protected $fillable = [
        //'SEOBEmpr',
        //'SEOBProy',
        //'SEOBAvanc',
        //'visit_date',

    ];


    protected $dates = [
        //'visit_date',
        //'created_at',
        //'updated_at',

    ];

    //protected $appends = ['resource_url', 'is_admin'];
    //protected $with = ['task'];
    /*public function task()
    {
        return $this->hasOne(Task::class, 'NroExp')->latest('id');
    }

    public function user()
    {
        return $this->hasOne(Task::class, 'NroExp')->latest('id');
    }*/
    /*public function advance()
    {
        return $this->hasOne(Task::class, 'NroExp')->latest('id');
    }*/



    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applications/' . $this->getKey());
    }

    public function getIsAdminAttribute()
    {
        return url('projects/' . $this->getKey());
    }
}
