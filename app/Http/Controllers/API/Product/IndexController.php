<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Products;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Products::all();
        $data = ProductResource::collection($products);
        return json_encode($data, JSON_UNESCAPED_UNICODE);

    }
}
