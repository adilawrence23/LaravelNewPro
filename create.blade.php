@extends('layout')


@section('head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">

@endsection


@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <br>
        
        <form method="POST" action="/articles">
            @csrf

            <div class="field">
                <label for="title" class="label">Title</label>

                <div class="control">
                    <!-- <input class="input {{$errors->has('title')?'is-danger':''}}" type="text" name="title" id="title" required> -->
                    <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
                    <!-- @if ($errors->has('title')) -->
                    @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror
                    <!-- @endif -->

                </div>
            </div>

            <div class="field">
                <label for="exerpt" class="label">Exerpt</label>

                <div class="control">
                    <textarea class="textarea @error('exerpt') is-danger @enderror" name="exerpt" id="exerpt" cols="30" rows="10">{{ old('exerpt') }}</textarea>
                    @error('exerpt')
                        <p class="help is-danger">{{$errors->first('exerpt')}}</p>
                    @enderror
                </div>
            </div>


            <div class="field">
                <label for="body" class="label">Body</label>

                <div class="control">
                    <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
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