<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    use HasFactory;

protected $fillable=[
    'nom',
    'prenoms',
    'date'
    ,'numero'
];
}
