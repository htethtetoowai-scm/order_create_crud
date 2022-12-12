<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
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
     * Get the product associated with the category.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the order associated with the user.
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**  
    *Ondelete cascade for user
    */
    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            foreach($category->subCategories as $subCategory) {
                $subCategory->delete();
            }
            foreach($category->items as $item) {
                $item->delete();
            }
        });
    }
}
