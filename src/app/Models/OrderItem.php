<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'item_id',
    ];

    /**
     * Get the orders that owns the orderItem.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the items that owns the orderItem.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
