<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'description',
    ];

    /**
     * Get the order associated with the user.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the rold that owns the user.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**  
    *Ondelete cascade for user
    */
    public static function boot() {
        parent::boot();

        static::deleting(function($subCategory) {
            foreach($subCategory->items as $item) {
                $item->delete();
            }
        });
    }
}
