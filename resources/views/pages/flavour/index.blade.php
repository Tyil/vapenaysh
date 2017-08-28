@extends('layouts.default')

@section('title', 'Flavour search')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Flavours')
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Brand</th>
                    </thead>
                    <tbody>
                        @foreach ($flavours as $flavour)
                            <tr>
                                <td>
                                    <a href="{{route('flavours.show', ['id' => $flavour->id])}}">
                                        {{$flavour->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$flavour->brand}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$flavours->links('vendor.pagination.bootstrap-4')}}
                </div>
            @endcomponent
        </div>
    </div>
@endsection
