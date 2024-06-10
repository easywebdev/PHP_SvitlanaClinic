<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model 
{
    /**
     * @var string
     */
    protected $table = 'slides';
    /**
     * @var bool
     */
    public $timestamps = false;

    /*
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'position',
    ];
}