<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificados extends Model
{
    use HasFactory;
    
    protected $table = 'classificados';
    public $timestamps = false;
}
