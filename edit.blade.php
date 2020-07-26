@extends('layout')

@section('head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    
@endsection


@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>
        <br>
        
        <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="title" class="label">Title</label>

                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                </div>
            </div>

            <div class="field">
                <label for="exerpt" class="label">Exerpt</label>

                <div class="control">
                    <textarea class="textarea" name="exerpt" id="exerpt" cols="30" rows="10">{{$article->exerpt}}</textarea>
                </div>
            </div>


            <div class="field">
                <label for="body" class="label">Body</label>

                <div class="control">
                    <textarea class="textarea" name="body" id="body" cols="30" rows="10">{{$article->body}}</textarea>
                </div>
            </div>
            

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>

                <div class="control">
                    <button class="button is-text">Cancel</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection