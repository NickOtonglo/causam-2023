<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\TagsResource;
use App\Http\Resources\ArticlesResource;
use App\Http\Requests\SaveTagRequest;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = TagsResource::collection(Tag::latest()->get());
        return $tags;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTagRequest $request)
    {
        $tagsRequest = explode(',',$request->name);
        $tags = [];

        foreach ($tagsRequest as $item) {
            $tag = Str::slug(trim($item), '-');
            array_push($tags,trim($item));

            if(!Tag::where('name',$tag)->exists()) {
                Tag::create([
                    'name' => $tag,
                ]);
            }
        }
        return $tags;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return new TagsResource($tag);
    }

    // public function show(Tag $tag)
    // {
    //     $articles = $tag->articles;
    //     return ArticlesResource::collection($articles);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveTagRequest $request, $id)
    {
        $tagNew = Tag::where('id', $request->id)->first();
        $tagNew->name = Str::slug(trim($request->name), '-');

        if(!Tag::where('name',$request->name)->exists()) {
            $tagNew->save();
        }
        return new TagsResource($tagNew);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
        return response()->noContent();
    }

    public function getArticles(Tag $tag) {
        $articles = $tag->articles;
        return ArticlesResource::collection($articles);
    }
}
