<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->belongsToMany(Products::class, 'product_tags', 'tag_id', 'product_id');
    }
}
