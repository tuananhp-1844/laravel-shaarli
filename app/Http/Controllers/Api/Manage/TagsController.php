<?php

namespace App\Http\Controllers\Api\Manage;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function all()
    {
        $tags = Tag::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        return response()->json($tags);
    }

    public function move(Request $request, string $from, string $to)
    {
        $posts = Post::withAnyTags($from)->get();

        $posts->each(function ($item) use ($to) {
            $item->attachTag($to);
        });

        return $this->delete($request, $from);
    }

    public function delete(Request $request, string $tag)
    {
        $tag = Tag::findNamedOrCreate($tag);
        $tag->delete();

        return response()->json();
    }
}
