<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayPackageDetail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hotel', 'packages'
    ];


    public function package()
    {
        return $this->belongsTo('App\HolidayPackage', 'holiday_package_id');
    }
}
