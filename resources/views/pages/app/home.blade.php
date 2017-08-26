@extends('layouts.default')

@section('title', 'Home')

@section('main')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($mixes as $mix)
                <div class="col-md-4">
                    <h2>{{$mix->name}}</h2>
                    <ul>
                        @foreach ($mix->ingredients as $ingredient)
                            <li>
                                <a href="{{route('flavours.show', ['id' => $ingredient->flavour->id])}}">
                                    {{$ingredient->flavour->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <p>
                        <a class="btn btn-secondary" href="{{route('mixes.show', ['id' => $mix->id])}}" role="button">
                            View mix &raquo;
                        </a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
