<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAddress extends Model
{
    use HasFactory;

    protected $collactions = 'config_addresses';

    protected $fillable = [
        'am',
        'ru',
        'en',
        'communityId',
        'addressId'
    ];
}
