@extends('layouts.default')

@section('title', 'Login')

@section('main')
    <div class="container">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Social login</h4>
                <div class="card-text">
                    <div class="text-center">
                        <a class="btn btn-link btn-lg" href="{{route('auth.social.redirect', ['driver' => 'facebook'])}}">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
