@extends('layouts.default')

@section('title', 'Login')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <form method="post" action="{{route('auth.register.finish')}}">
                    {{csrf_field()}}
                    @component('card')
                        @slot('title', 'Local login')
                        @component('input')
                            @slot('id', 'email')
                        @endcomponent
                        @component('input')
                            @slot('type', 'password')
                            @slot('id', 'password')
                        @endcomponent
                        @component('button')
                            @slot('type', 'submit')
                            Sign in
                        @endcomponent
                    @endcomponent
                </form>
            </div>
            <div class="col-md-6 col-sm-12">
                @component('card')
                    @slot('title', 'Social login')
                        @foreach ($socialDrivers as $name => $label)
                            <a class="btn btn-block btn-social social-{{$name}}" href="{{route('auth.social.redirect', ['driver' => $name])}}">
                                <i class="fa fa-{{$name}}"></i>
                                {{$label}}
                            </a>
                        @endforeach
                @endcomponent
            </div>
        </div>
    </div>
@endsection
