<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $posts = Post::paginate(5); */
        $posts = Post::orderBy('id','desc')->paginate(5);//li ordino in modo decrescente
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    /*
        $post=new Post;
        return view('admin.posts.create',compact('post'));
    /* ****************Oppure ***************/

        return view('admin.posts.create',['post'=>new Post()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //!Validazione
        $request->validate([
            'title'=>'required|string|unique:post|min:5',
            'content'=>'required|string',
            'image'=>'string',
        ]);

        //Recuperiamo i dati dal Form
        $data=$request->all();// tutti eventuali dati del form
        /* creiamo un nuovo post */
        $post =new Post ();
        /* Filliamo i dati */
        $post -> fill($data);// ? I fillable sono defini nel modello Post
        //creare lo slug
        $post->slug =Str::slug($post->title,'-');//->Importare Str

        $post ->save();//Salviamo i fillable
        return redirect()->route('admin.posts.show',compact('post'));//rindiriziamo la route alla show passondo la $post o anche l'ID

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return view('admin.posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
         //!Validazione
        $data =$request->all();
        $post ->fill($data);
        $post->slug =Str::slug($post->title,'-');
        $post->save();
        return redirect()->route('admin.posts.show',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       /*  $post=Post::all(); */
       /* dd($post->title); */
        $post->delete();
        return redirect()->route('admin.posts.index')
        ->with("alert-message","E\ stato $post->title eliminato con successo")
        ->with('alert-type','warning');
    }
}
