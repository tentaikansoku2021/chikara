<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunbougu extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'name',
        'price',
        'classification',
        'detail',
        'user_id'
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
