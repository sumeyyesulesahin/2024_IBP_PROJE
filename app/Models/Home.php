<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'homes';

    protected $fillable = [
        'home_name',
        'location',
        'post_code',
        'defination'
    ];
}
