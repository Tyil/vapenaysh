@extends('layouts.default')

@section('title', "{$flavour->name} ({$flavour->brand})")

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Details')
                <ul>
                    <li>
                        For purchase at <a href="{{$flavour->link}}">{{$flavour->link}}</a>
                    </li>
                </ul>
                {{$flavour->description}}
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Stats')
                @component('keyval')
                    Number of times used in mixes
                    {{$flavour->mixFlavours->count()}}
                @endcomponent
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Alternatives')
                @if (0 < count($alternatives))
                    <ul class="list-group">
                        @foreach ($alternatives as $alternative)
                            <li class="list-group-item">{{$alternative->name}}</li>
                        @endforeach
                    </ul>
                @else
                    <p>There are no (known) alternatives for this flavour.</p>
                @endif
            @endcomponent
        </div>
    </div>
@endsection
