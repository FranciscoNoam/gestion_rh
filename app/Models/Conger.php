<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conger extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'total_day','total_year'];
}
