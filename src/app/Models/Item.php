<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'description',
        'price',
        'image_path'
    ];

    /**
     * Get the order associated with the user.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the rold that owns the user.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the rold that owns the user.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getImageStringAttribute($value)
    {
        if (!Storage::disk('public')->exists($this->image_path)) {
            return $this->image_path;
        }
        return base64_encode(file_get_contents(storage_path('app/public/'.$this->image_path)));
    }

    /**  
    *Ondelete cascade for user
    */
    public static function boot() {
        parent::boot();

        static::deleting(function($item) {
            foreach($item->orderItems as $orderItem) {
                $orderItem->delete();
            }
        });
    }

}
