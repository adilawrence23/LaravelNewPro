<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{


    // public function show($articleId)
    // {
    //     dd($articleId);
    // }

    public function index()
    {
        //Renders a list of resource
        $articles = Article::latest()->get();

        return view('articles.index',['articles' => $articles]);
    }


    // public function show($id)
    public function show(Article $article)
    {
        //Shows a single resource
        // die('Hello');
        // $article = Article::findOrFail($id);

        return view('articles.show',['article'=>$article]);
        // return $article;
    }
    public function create()
    {
        //Shows a view to create a new resource
        return view('articles.create');
    }
    public function store()
    {
        // $validatedattributes= request()->validate([
        //     'title'=>['required','min:6','max:30'],
        //     'exerpt'=>'required',
        //     'body'=>'required'
        // ]);

        // Article::create($validatedAttributes);


        // Article::create(request()->validate([
        //     'title'=>['required','min:6','max:30'],
        //     'exerpt'=>'required',
        //     'body'=>'required'
        // ]));

        Article::create($this->validateArticle());

        //Persist the new resource
        // die('Hello');
        // dump(request()->all());


        // $article =  new Article();

        // $article->title = request('title');
        // $article->exerpt = request('exerpt');
        // $article->body = request('body');

        // $article->save();

        // Article::create([
        //     'title'=>request('title'),
        //     'exerpt'=>request('exerpt'),
        //     'body'=>request('body'),
        // ]);

        return redirect(route('articles.index'));
    }
    // public function edit($id)
    public function edit(Article $article)
    {
        //Show a view to edit an existing resource
        // $article = Article::find($id);

        //Find the article associated with the id
        return view('articles.edit',compact('article'));
    }
    // public function update($id)
    public function update(Article $article)
    {
       
       //inline
        //    $article->update(request()->validate([
        //         'title'=>['required','min:6','max:30'],
        //         'exerpt'=>'required',
        //         'body'=>'required'
        //    ]));

            $article->update($this->validateArticle());
       
        // request()->validate([
        //     'title'=>['required','min:6','max:30'],
        //     'exerpt'=>'required',
        //     'body'=>'required'
        // ]);
        //Persist the edited resource
        // $article = Article::find($id);

        // $article->title = request('title');
        // $article->exerpt = request('exerpt');
        // $article->body = request('body');

        // $article->save();

        // return redirect(route('articles.show',$article));
        return redirect($article->path());
    }
    // public function destroy()
    // {
    //     //Delete the resource
    // }

    protected function validateArticle()
    {
        return request()->validate([
             'title'=>['required','min:6','max:50'],
             'exerpt'=>'required',
             'body'=>'required'
        ]);
    }
}


// GET/articles
// GET/articles/:id

//GET Defines reading 
//PUT/PATCH Defines updation
//DELETE Defines deletion 
//POST for submitting information in a form
//GET,POST,PUT,DELETE

// PUT/users - Shows list of users
// PUT/users/20 - shows a single user with id 20


//GET/videos
//GET/videos/create
//POST/videos
//GET/videos/2
//PUT/videos/2/edit
//DELETE/videos/2

//GET/videos/subscribe

//POST/videos/subscriptions=>VideoSubstriptionController@store