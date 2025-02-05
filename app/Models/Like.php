<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /** @use HasFactory<\Database\Factories\LikeFactory> */
    use HasFactory;

    protected $table = "likes";
    protected $guarded = ["id"];
    protected $primaryKey = "id";

    public function likeable()
    {
        return $this->morphTo();
    }
}
