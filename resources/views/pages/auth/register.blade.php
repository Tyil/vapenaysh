@extends('layouts.default')

@section('title', 'Register')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" action="{{route('auth.register.set-auth')}}">
                    @component('card')
                        @slot('title', 'Public information')
                        <p class="text-muted">
                            Pick some information thats publicly visible to the
                            other users. In the next step you can choose how to
                            authenticate to your account, either by email/password
                            combination or through a number of social media
                            accounts.
                        </p>
                        @component('input')
                            @slot('id', 'name')
                        @endcomponent
                        @component('button')
                            @slot('type', 'submit')
                            @slot('icon', 'arrow-right')
                            Continue
                        @endcomponent
                    @endcomponent
                </form>
            </div>
        </div>
    </div>
@endsection
