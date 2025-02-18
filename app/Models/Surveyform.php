<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyform extends Model
{
    protected $primaryKey = 'IdSurvey';
    // public $timestamps = true;
    public $timestamps = false;
    protected $table = 'surveyform';
    use HasFactory;
}
