<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelSample extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'model_samples';
    protected $fillable = [
        'name', 
        'area',
        'status'
    ];
}


