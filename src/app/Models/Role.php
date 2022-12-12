<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the users associated with the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**  
     * Ondelete cascade for role
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            foreach ($role->users as $user) {
                $user->delete();
            }
        });
    }
}
