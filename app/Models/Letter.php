<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'delivery_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
