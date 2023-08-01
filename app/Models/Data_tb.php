<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_tb extends Model
{
    use HasFactory;
    protected $fillable = [
        'lastname',
        'name',
        'email',
        'email2',
        'profession',
    ];
}
