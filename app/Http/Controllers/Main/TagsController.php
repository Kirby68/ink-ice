<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\tag;

class TagsController extends Controller
{
    public function __invoke()
    {
        $tags = tag::all();
        return view('main.tag', compact('tags'));
    }
    public function create()
    {
        return view('main.tag_create');
    }

    public function store(StoreRequest $request)
    {
        $tags = $request->validated();
        Tag::firstOrCreate($tags);
        return redirect()->route('admin.tag');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag');
    }

    public function edit(Tag $tag)
    {
        return view('main.tag_edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tag');
    }
}
