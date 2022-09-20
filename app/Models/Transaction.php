<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'receiver',
        'amount',
    ];

    public function users()
    {
        return this->belongsToMany(User::class);
    }
}
