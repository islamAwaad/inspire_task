<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'text', 'user_id'];

    /**
     * 
     * relations
     * 
     */
    public function users()
    {
        return $this->belongTo(User::class);
    }
}
