<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total_price',
        'delivery_email',
        'delivery_phone',
        'delivery_address',
    ];

    /**
     * Get the orderItems associated with the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
