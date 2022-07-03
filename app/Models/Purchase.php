<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = [
        'desig_id',
        'last_name',
        'middle_name',
        'middle_name',
        'suffix_name',
        'supplier_code',
        'category_code',
        'product_code',
    ];

    public function supplier(){
    return $this->hasOne('App\Models\Supplier','supplier_code','supplier_code');
    }

  public function category(){
    return $this->belongsTo('App\Models\Category','category_code','category_code');
    }

  public function products(){
    return $this->hasOne('App\Models\Products','product_code','product_code');
    }

    public function purchaseSuffix(){
      return $this->hasOne('App\Models\SuffixName','suffix_code','suffix_name');
    }

    public function purchaseDesignation(){
      return $this->hasOne('App\Models\Designation','id','desig_id');
    }

}
