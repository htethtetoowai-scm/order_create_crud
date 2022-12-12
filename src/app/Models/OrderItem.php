<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

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
     * Get the rold that owns the user.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
        
    /**
     * Get the rold that owns the user.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
