<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class PostController extends Controller
{   
    //auth function added to prevent users not logged in from using creating post
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         /*fetching data using eloquent or sql */
        // return Post::all();
        // $posts= Post::all();//get the rows in post and store in var posts
        // get data from db using title in desc order
        // $posts= Post::orderBy('title', 'desc')->get();

         $posts= DB::select("SELECT * FROM posts");//using sql
         return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|nullable|1999'
        ]);
        if($request->hasFile('cover_image'))
        {  //handle the file upload
            $filenameWithExt= $request->file('cover_image')->getClientOriginalImage();
            //get just filename
            $filename= pathinfo($filenameWithExt, PATHINFO_FILE);
        }else{
            $fileNameToStore='noimage.jpeg';
        }

        $post= new Post; //create a new post
        $post->title= $request->input('title'); //request and assign the field in db to object post->title
        $post->body= $request->input('body');
        $post->user_id= auth()->user()->id;//get user id associated to a post, didnt use request here because the id isnt coming from post but from auth
        $post->save();
        return redirect('/posts')->with('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post= Post::find($id);//get all ids in the db
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);//get posts via ids in the db
        if(auth()->user()->id !== $post->user_id)
        //return unauthorized user back to the blogs when the user try to access edit page via url
        //e.g posts/1/edit for user 2
        {
            return redirect("/posts")->with('error', 'Unauthorized page');
        }
        return view('posts.edit')->with('post', $post);
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
        {
            $this->validate($request,[
                'title'=>'required',
                'body'=>'required'
            ]);
    
            $post= Post::find($id); //find post via id
            //request and assign the field to object post->title
            $post->title= $request->input('title'); 
            $post->body= $request->input('body');
            $post->save();
            return redirect('/posts')->with('success','post updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        //return unauthorized user back to the blogs when the user try to access delete page via url
        //e.g posts/1/destroy for user 2
        {
            return redirect("/posts")->with('error', 'Unauthorized page');
        }
        $post->delete();
        return redirect('/posts')->with('success','post deleted');

    }
    
}
