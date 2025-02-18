<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'IdQuestion ';
    // public $timestamps = true;
    public $timestamps = false;
    protected $table = 'question';
    use HasFactory;
}
