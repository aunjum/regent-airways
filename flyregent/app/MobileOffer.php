<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MobileOffer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'subtitle', 'image','order'
    ];
}
