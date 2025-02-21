<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Products;

class ShowController extends Controller
{
    public function __invoke(Products $product)
    {
        return new ProductResource($product);
    }
}
