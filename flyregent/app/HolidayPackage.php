<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HolidayPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'country', 'place', 'title','image','order','description'
    ];


    public function details()
    {
        return $this->hasMany('App\HolidayPackageDetail', 'holiday_package_id');
    }
}
