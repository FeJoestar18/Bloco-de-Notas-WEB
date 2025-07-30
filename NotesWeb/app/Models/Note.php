<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'is_public',
        'user_id'
    ];

    /**
     * Get the user that owns the note
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the note is anonymous (created by a guest user)
     */
    public function isAnonymous()
    {
        return $this->user_id === null;
    }
}
