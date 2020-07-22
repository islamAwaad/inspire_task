<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $filable = ['name'];
    /**
     * 
     * relations
     * 
     */
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}