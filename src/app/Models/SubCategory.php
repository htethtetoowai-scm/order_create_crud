<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'category_id',
        'description',
    ];

    /**
     * Get the items associated with the subCategory.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the category that owns the subCategory.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**  
     * Ondelete cascade for subCategory
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($subCategory) {
            foreach ($subCategory->items as $item) {
                $item->delete();
            }
        });
    }
}
