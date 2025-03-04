<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['category', 'user'])->paginate(10);

        return response()->json($articles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title_article' => ['required','string','max:255'],
            'date_article' => ['required','date'],
            'content_article' => ['required','string'],
            'category_id' => ['required','integer'],
            'user_id' => ['required','integer'],
        ]);

        $filename = "";
        if ($request->hasFile('image_article')) {
            $filenameWithExt = $request->file('image_article')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_article')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_article')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }


        $article = Article::create(array_merge($request->all(), ['photoPlayer' => $filename]));

        return response()->json([
            'status' => 'Success',
            'data' => $article,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json($article, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title_article' => ['required','string','max:255'],
            'date_article' => ['required','date'],
            'content_article' => ['required','string'],
            'category_id' => ['required','integer'],
            'user_id' => ['required','integer'],
        ]);

            $filename = "";
            if ($request->hasFile('image_article')) {
                $filenameWithExt = $request->file('image_article')->getClientOriginalName();
                $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image_article')->getClientOriginalExtension();
                $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
                $path = $request->file('image_article')->storeAs('public/uploads', $filename);
            } else {
                $filename = Null;
            }


            $article = Article::create(array_merge($request->all(), ['photoPlayer' => $filename]));

            return response()->json([
                'status' => 'Success',
                'data' => $article,
            ]);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
