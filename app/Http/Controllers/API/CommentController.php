<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->look_id) {
            return "look id can not be empty";
        }
        if (!$request->user_id) {
            return "user id can not be empty";
        }
        if (!$request->comment) {
            return "comment can not be empty";
        }
        $input = $request->only(['user_id', 'look_id','comment']);
//        dd($input);
//        $user_id = $request->user_id;
//        $look_id = $request->look_id;
//        $comment = $request->comment;
        return Comment::create($request->only(['user_id', 'look_id','comment']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Comment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->comment) {
            return "comment can not be empty";
        }
        if (!$id) {
            return "comment id can not be empty";
        }

        return Comment::findOrFail($id)->update($request->only('comment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Comment::findOrFail($id)->delete();
    }
}
