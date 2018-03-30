<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Task;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $task_id)
    {
        $request->user()->authorizeRoles(['receiving']);

        $this->validate($request, array(
           'comment' => 'required|max:2000'
        ));

        $task = Task::find($task_id);
        $id = \Auth::user()->id;

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $id;
        $comment->task()->associate($task);

        $comment->save();

        Session::flash('success', 'Dodano komentarz.');

        return redirect()->route('tasks.edit', $task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles(['receiving']);

        $comment = Comment::find($id);

        $comment->delete();

        Session::flash('success', 'Usunięto komentarz.');

        return redirect()->back();
    }
}
