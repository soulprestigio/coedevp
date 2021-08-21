<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\modelSample;

class reserved extends Model
{
    use HasFactory;
    public $status;
    public $table = "reserved";
    
    protected $fillable = [
        'id',
        'name', 
        'area',
        'status'
    ];  
    
    
    public function status()
    {
        return $this->status->belongsTo(modelSample::class);
    }
}
