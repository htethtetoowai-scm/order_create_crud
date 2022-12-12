<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the items associated with the category.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the subCategories associated with the category.
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**  
     * Ondelete cascade for category
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            foreach ($category->subCategories as $subCategory) {
                $subCategory->delete();
            }
            foreach ($category->items as $item) {
                $item->delete();
            }
        });
    }
}
