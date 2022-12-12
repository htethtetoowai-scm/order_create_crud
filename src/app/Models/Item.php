<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'description',
        'price',
        'image_path'
    ];

    /**
     * Get the orderItems associated with the item.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the category that owns the item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the subCategory that owns the item.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get the item's image.
     *
     * @return string
     */
    public function getImageStringAttribute()
    {
        if (!Storage::disk('public')->exists($this->image_path)) {
            return $this->image_path;
        }
        return base64_encode(file_get_contents(storage_path('app/public/' . $this->image_path)));
    }

    /**  
     * Ondelete cascade for item
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            foreach ($item->orderItems as $orderItem) {
                $orderItem->delete();
            }
        });
    }
}
