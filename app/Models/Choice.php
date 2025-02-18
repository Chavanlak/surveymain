<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $primaryKey = 'Idchoice ';
    // public $timestamps = true;
    public $timestamps = false;
    protected $table = 'choice';
    use HasFactory;
}
