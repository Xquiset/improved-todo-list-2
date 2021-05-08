<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        $tasks = Item::whereUser(auth()->id())->get();
        return inertia('Dashboard', ['items' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\ResponseFactory
     */
    public function create()
    {
        return inertia('Tasks/CreateTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $task = new Item;
        $task->user = Auth::id();
        $task->task_name = $request['name'];
        $task->description = $request['description'];
        $task->save();

        return Redirect::route('items.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        $route = 'dashboard';
        if( $request->routeIs('items.edit') ){
            // Update edit page data
            $item->task_name = isset($request['task_name']) ? $request['task_name'] : $item->task_name;
            $item->description = isset($request['descirption']) ? $request['descirption'] : $item->description;
            $route = 'items.edit';
        } else if( $request->routeIs('dashboard')){
            // Update dashboard page data
            $item->completed = isset($request['completed']) ? $request['completed'] : $item->completed;
            $item->completed_at = $item->completed ? Carbon::now() : null;
        }

        $item->save();

        return Redirect::route($route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
