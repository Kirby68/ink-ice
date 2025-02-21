<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tag;
use Laravel\Sanctum\HasApiTokens;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'content',
        'preview_image',
        'price',
        'count',
        'is_published',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
}
