<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesProduct extends Model
{
    protected $table = 'images_product';

    protected $guarded = ['id'];

    public function imageRelation()
    {

       return $this->hasMany('App\Models\ImagesProduct','product_id','id');
    }
}
