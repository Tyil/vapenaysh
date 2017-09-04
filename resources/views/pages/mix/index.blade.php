@extends('layouts.default')

@section('title', 'Mix search')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @component('card')
                @slot('title', 'Mixes')
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Creator</th>
                    </thead>
                    <tbody>
                        @foreach ($mixes as $mix)
                            <tr>
                                <td>
                                    <a href="{{route('mixes.show', ['id' => $mix->id])}}">
                                        {{$mix->name}}
                                    </a>
                                </td>
                                <td>
                                    @if ($mix->creator !== null)
                                        <a href="{{route('users.show', ['id' => $mix->creator->id])}}">
                                            {{$mix->creator->name}}
                                        </a>
                                    @else
                                        Unknown
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$mixes->links('vendor.pagination.bootstrap-4')}}
                </div>
            @endcomponent
        </div>
    </div>
@endsection
