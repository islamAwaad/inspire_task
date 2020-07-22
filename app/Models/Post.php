<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'description', 'user_id'];

    /**
     * 
     *  accessors and mutators
     * 
     */
    public function getImageAttribute($value) {
        return $value ? url($value):'';
    }

    public function getDescriptionAttribute($value) {
        return $value ? html_entity_decode($value) :'';
    }
    /**
     * 
     * relations
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}