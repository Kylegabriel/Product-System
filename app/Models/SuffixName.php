<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuffixName extends Model
{
    protected $table = 'suffix_names';

    public function purchase(){
        $this->belongsTo('App\Models\Purchase');
    }

}
