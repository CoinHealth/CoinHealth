<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedProcedure extends Model
{
    protected $table = 'med_procedures';
    
    public $timestamps = false;
    
    protected $fillable = [
    	'uid',
    	'name',
    ];
    
}
