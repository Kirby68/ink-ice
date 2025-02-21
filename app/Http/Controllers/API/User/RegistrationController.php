<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegsitrationRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Products;
use App\Models\User;

class RegistrationController extends Controller
{
    public function __invoke(RegsitrationRequest $request)
    {
        $data = $request->validated();
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);
        return response([]);
    }
}
