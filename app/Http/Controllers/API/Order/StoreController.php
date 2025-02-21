<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $order = Order::create([
            'products' => json_encode($data['products']),
            'user_id' => $data['user_id'],
            'total_price' => $data['total_price'],
        ]);
        return new OrderResource($order);
    }
}
