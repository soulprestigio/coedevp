<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelSample extends Model
{
    use HasFactory;
    protected $primaryKey = 'name';
    protected $fillable = [
        'name', 
        'area',
        'status'
    ];
}


