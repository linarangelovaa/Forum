<?php

namespace App\Http\Controllers;


use App\Models\Topic;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        $topics = Topic::get();
        /*   dd($topics); */
        $categories = Category::get();
        $users = User::get();
        /*  dd($categories); */
        return view('topic.homepage', compact('topics'));
    }

    public function approve()
    {

        $topics = Topic::all();
        /*  dd($topics); */
        $categories = Category::get();
        $users = User::get();
        /* dd($categories); */
        return view('topic.approve', compact('topics', 'categories', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('topic.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Topic $topic)
    {


        $topics = Topic::all();
        $topic = Topic::find(1);
        $topic = new Topic();
        $cat = $request->categories;
        $topic->title = $request->title;
        $topic->picture = $request->picture;
        $topic->description = $request->description;
        $topic->user_id = Auth::user()->id;
        $topic->category_id = reset($cat);
        if ($topic->save()) {
            return  view('topic.approve', compact('topics'));
        }
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
        $topics = Topic::all();
        $categories = Category::all();
        $topic = Topic::find($id);

        return view('topic.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {

        $cat = $request->categories;
        $topic->title = $request->title;
        $topic->picture = $request->picture;
        $topic->description = $request->description;
        $topic->user_id = Auth::user()->id;
        $topic->category_id = reset($cat);


        if ($topic->save()) {
            return redirect()->route('topic.homepage')->with('success', 'Topic updated!!!');
        }

        return redirect()->route('topic.homepage')->with('error', 'An errror occured!!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::find($id)->delete();



        return redirect()->route('topic.homepage');


        /* return response()->json(['success' => 'Movie Deleted!!']); */
    }
}