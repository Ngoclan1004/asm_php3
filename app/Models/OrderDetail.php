<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'dơn_hang_id',
        'san_pham_id',
        'don_gia',
        'so_luong',
        'thanh_tien',
    ];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
