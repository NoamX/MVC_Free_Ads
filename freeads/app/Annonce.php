<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'title', 'price', 'description', 'user_id',
    ];
}
