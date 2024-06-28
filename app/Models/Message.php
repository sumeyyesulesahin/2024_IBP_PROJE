<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'message',
        'sender_id',
        'receiver_id'
    ];
}
