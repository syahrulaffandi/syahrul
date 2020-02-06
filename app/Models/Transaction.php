<?php

namespace App\Models;

use DB;
use App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    protected $guarded = ['id'];

    public function scopeGetCode($query)
    {
        $string = "TR";

        $selectLastCode = DB::raw(" coalesce( MAX( CAST( RIGHT( transaction_code, 5) AS UNSIGNED ))  ,0) as code ");

        $getData = $query->select($selectLastCode)->where('transaction_code', 'LIKE', '%' . $string . '%')->first();

        $number = sprintf("%'.05d ", $getData->code + 1);

        return $string.$number;
    }
    public function detailRelation()
    {
        return $this->hasMany(\App\Models\DetailsTransaction::class, 'transaction_id', 'id');
    }

    public function userRelation()
    {
        return $this->hasOne(\App\Models\user::class,'id','user_id');
    }
}
