<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $collection = 'homes';
    protected $fillable = [
        'role_id',
        'home_id',
        'photo',
        'file',
        'status',
        'am',
        'ru',
        'en',
        'price_history',

    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->home_id = $model->id + 10000;
            $model->save();
        });
    }

    const 
        STATUS_MODERATION = 'moderation',
        STATUS_APPROVED = 'approved',
        STATUS_ARCHIVED = 'archived',
        STATUS_INACTIVE = 'inactive';

}
