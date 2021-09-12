<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book, Request $request)
    {
        $this->Like($request, $book);

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }

    /**
     * like or unlike the specified resource from storage.
     *
     * @param  $request
     * @param  $book
     * @param  $comment
     * @return void
     */
    public function Like($request, $book = null, $comment = null)
    {
        if ($request->like) {
            $book->likes()->increment('like');
        } elseif ($request->unlike) {
            $book->likes()->increment('unLike');
        } elseif ($request->LikeComment) {
            $comment->comments()->increment('like');
        } elseif ($request->unlikeComment) {
            $book->comments()->increment('unLike');
        }
    }
}
