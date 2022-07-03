<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    
    protected $table = 'designation';

    protected $fillable = ['designation'];
    public $timestamps = false;
    
    public function purchase(){
        return $this->belongsTo('App\Model\Purchase');
    }

}
