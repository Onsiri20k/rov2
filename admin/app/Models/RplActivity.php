<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RplActivity extends Model
{
    protected $fillable = [
        'photo',
        'title',
        'description',
        'textIndication',
        'status'
    ];
}

