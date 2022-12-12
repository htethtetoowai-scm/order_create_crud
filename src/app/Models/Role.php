<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    /**
     * Get the order associated with the user.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**  
    *Ondelete cascade for user
    */
    public static function boot() {
        parent::boot();

        static::deleting(function($role) {
            foreach($role->users as $user) {
                $user->delete();
            }
        });
    }
}
