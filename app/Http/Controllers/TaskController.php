<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Task;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
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
    public function index(Request $request)
    {
        $id = \Auth::user()->id;

        if(auth()->user()->hasRole('declarant'))
        {
            $tasks = Task::where('user_id', $id)->orderBy('updated_at', 'desc')->paginate(10);
        }
        else
        {
            $tasks = Task::orderBy('updated_at', 'desc')->paginate(10);
        }

        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['declarant']);

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['declarant']);

        $this->validate($request, array (
            'title' => 'required|max:255',
            'description' => 'required'
            //walidacja dla plikow
        ));

        $task = new Task;
        $id = \Auth::user()->id;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $id;

        if($request->hasFile('file_path'))
        {
            $file_content = $request->file('file_path');
            $filename = time() . '.' . $file_content->getClientOriginalExtension();
            $request->file_path->move(public_path('files/'), $filename);
            $task->file_path = $filename;
        }

        $task->save();

        Session::flash('success', 'Zadanie zostało dodane do systemu. Wkrótce zostanie rozpatrzone.');

        return redirect()->route('tasks.show', $task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['receiving']);

        $task = Task::find($id);

        return view('tasks.edit')->withTask($task);
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
        $request->user()->authorizeRoles(['receiving']);

        $this->validate($request, array (
            'status' => 'required'
        ));

        $task = Task::find($id);

        $task->status = $request->status;

        $task->save();

        Session::flash('success', 'Edycja zadania przebiegła pomyślnie.');

        return redirect()->route('tasks.show', $task->id);
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

        $task = Task::find($id);

        $task->delete();

        Session::flash('success', 'Zadanie zostało usunięte.');

        return redirect()->route('tasks.index');
    }
}
