@extends('layouts.default')

@section('title', 'Login')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    @slot('title', 'Social login')
                    <div class="text-center">
                        <a class="btn btn-link btn-lg" href="{{route('auth.social.redirect', ['driver' => 'facebook'])}}">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                    </div>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
