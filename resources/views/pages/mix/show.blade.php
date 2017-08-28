@extends('layouts.default')

@section('title', $mix->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Ingredients')
                    <table class="table table-striped">
                        <thead>
                            <th>Flavour</th>
                            <th>Units</th>
                            <th>
                                <abbr title="mg/ml">
                                    Nicotine
                                </abbr>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($mix->ingredients as $element)
                                <tr>
                                    <td>
                                        <a href="{{route('flavours.show', ['id' => $element->flavour->id])}}">
                                            {{$element->flavour->name}}
                                        </a>
                                        <small>{{$element->flavour->brand}}</small>
                                    </td>
                                    <td>{{$element->units}}</td>
                                    <td>{{$element->nicotine}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endcomponent
            @component('card')
                @slot('title', 'Information')
                {{$mix->description}}
            @endcomponent
            @component('card')
                @slot('title', 'Comments')
                @forelse ($mix->comments as $comment)
                    @component('card')
                        @slot('footer')
                            {{$comment->created_at->diffForHumans()}} by
                            @if ($comment->author !== null)
                                <a href="{{route('users.show', ['id' => $comment->author->id])}}">
                                    {{$comment->author->name}}
                                </a>
                            @else
                                Unknown
                            @endif
                        @endslot
                        {{$comment->body}}
                    @endcomponent
                @empty
                    <p class="text-center">
                        No comments here
                    </p>
                @endforelse
            @endcomponent
        </div>
    </div>
@endsection
