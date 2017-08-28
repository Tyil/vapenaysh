@extends('layouts.default')

@section('title', 'Create a new mix')

@section('content')
    <form method="get" action="{{route('mixes.create')}}">
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    @component('input-number')
                        @slot('id', 'flavours')
                        @slot('default', 2)
                        @slot('step', 1)
                        @slot('min', 2)
                        @slot('label', 'Number of flavours')
                    @endcomponent
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-arrow-right"></i>
                            Next
                        </button>
                    </div>
                @endcomponent
            </div>
        </div>
    </form>
@endsection
