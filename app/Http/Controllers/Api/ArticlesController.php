<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\TagsResource;
use App\Http\Requests\SaveArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = ArticlesResource::collection(Article::latest()->get());
        $articles = ArticlesResource::collection(Article::latest()->paginate(10));
        return $articles;
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
    public function store(SaveArticleRequest $request)
    {
        $slug = Str::slug($request->title, '-');

        if($request->hasFile('thumbnail')) {
            $fileName = time()
                        .'-'.$slug.'.'
                        .$request->thumbnail->extension();
            $path = $request->file('thumbnail')->storeAs('public/images/articles/'.$slug, $fileName);
            // $article = Article::create($request->validated());
            // $article = Article::create([
            //     'title' => $request->title,
            //     'content' => $request->content,
            //     'thumbnail' => $fileName
            // ]);

            $data = new Article;
            $data->title = $request->title;
            $data->preview = substr($request->preview, 0, 150);
            $data->content = $request->content;
            $data->thumbnail = $fileName;
            $data->user_id = auth()->user()->id;

            try{
                $data->slug = $slug;
                $data->save();
            } catch (QueryException $e) {
                $data->slug = $slug.'-'.time();
                $data->save();
            }

            if($request->has('tags')) {
                $tagsRequest = explode(',',$request->tags);
                foreach ($tagsRequest as $tag) {
                    $this->createTag($tag);
                    $this->linkTagToArticle($data, $tag);
                }
            }

            return new ArticlesResource($data);
        } else {
            return 'Thumbnail required.';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return new ArticlesResource($article);
    }

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
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $slug = $article->slug;

        if($request->hasFile('thumbnail')) {
            $fileName = time()
                        .'-'.$slug.'.'
                        .$request->thumbnail->extension();
            $path = $request->file('thumbnail')->storeAs('public/images/articles/'.$slug, $fileName);

            // Delete old thumbnail
            Storage::delete('public/images/articles/'.$slug.'/'.$article->thumbnail);
        }

        $data = $article;
        $data->title = $request->title;
        $data->preview = substr($request->preview, 0, 150);
        $data->content = $request->content;
        if($request->hasFile('thumbnail')) {
            $data->thumbnail = $fileName;
        }
        $data->save();

        $this->unlinkTag($article);

        if($request->has('tags')) {
            $tagsRequest = explode(',',$request->tags);
            foreach ($tagsRequest as $tag) {
                $this->createTag($tag);
                $this->linkTagToArticle($data, $tag);
            }
        }

        return new ArticlesResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // Delete thumbnail
        Storage::deleteDirectory('public/images/articles/'.$article->slug.'/');

        $this->unlinkTag($article);

        $article->delete();
        return response()->noContent();
    }

    public function createTag($tag) {
        if(!Tag::where('name',$tag)->exists() && $tag !== '') {
            Tag::create([
                'name' => trim($tag),
            ]);
        }
    }

    public function getTags(Article $article) {
        $tags = $article->tags;
        return TagsResource::collection($tags);
    }

    public function linkTagToArticle(Article $article, $tag) {
        $article->tags()->attach(Tag::where('name', $tag)->get());
    }

    public function unlinkTag(Article $article) {
        $article->tags()->detach();
    }

    public function getAuthorName(Article $article) {
        $author = $article->user;
        return response()->json([
            'author' => [
                'name' => $author->name,
                'id' => $author->id,
            ]
        ]);
    }
}
