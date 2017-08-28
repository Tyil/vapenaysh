@extends('layouts.default')

@section('title', 'Add new flavour')

@section('content')
    <form method="post" action="{{route('flavours.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    @slot('title', 'Flavour details')
                    @component('input')
                        @slot('id', 'name')
                        @slot('required', true)
                    @endcomponent
                    @component('input')
                        @slot('id', 'brand')
                        @slot('required', true)
                    @endcomponent
                    @component('input')
                        @slot('id', 'link')
                    @endcomponent
                    @component('input-text')
                        @slot('id', 'description')
                    @endcomponent
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    @component('card')
                        @component('button')
                            @slot('icon', 'save')
                            Save
                        @endcomponent
                    @endcomponent
                </div>
            </div>
        </div>
    </form>
@endsection
