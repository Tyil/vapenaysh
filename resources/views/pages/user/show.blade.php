@extends('layouts.default')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'User stats')
                @component('keyval')
                    Mixes created
                    {{$user->mixes->count()}}
                @endcomponent
                @component('keyval')
                    Comments posted
                    {{$user->mixComments->count()}}
                @endcomponent
                @component('keyval')
                    Registration date
                    {{$user->created_at->toDateString()}}
                @endcomponent
            @endcomponent
        </div>
    </div>
@endsection
