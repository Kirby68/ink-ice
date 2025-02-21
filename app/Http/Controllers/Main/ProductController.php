<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Products;
use App\Models\tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __invoke()
    {
        $products = Products::all();
        return view('main.product', compact('products'));
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('main.product_create', compact('tags', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data2 = $request->validated();
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids'])){
                $TagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
            $product = Products::firstOrCreate($data);
            if(isset($data2['tag_ids'])) {
                $product->tags()->sync($TagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500, $exception->getMessage());
        }
        return redirect()->route('admin.product');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('admin.product');
    }

    public function edit(Products $product)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('main.product_edit', compact('product', 'tags', 'categories'));
    }

    public function show(Products $product)
    {
        $tags = Tag::all();
        return view('main.product_show', compact('product', 'tags'));
    }

    public function update(UpdateRequest $request, Products $product)
    {
        $data = $request->validated();
        $data2 = $request->validated();
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids'])) {
                $TagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
            } else {
                $data['preview_image'] = $product->preview_image;
            }
            $product->update($data);
            if(isset($data2['tag_ids'])) {
                $product->tags()->sync($TagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500, $exception->getMessage());
        }
        return redirect()->route('admin.product');
    }
}
