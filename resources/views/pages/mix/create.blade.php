@extends('layouts.default')

@section('title', 'Create new mix')

@section('content')
    <form method="post" action="{{route('mixes.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    @slot('title', 'Mix details')
                    @component('input')
                        @slot('id', 'name')
                    @endcomponent
                    @component('input')
                        @slot('id', 'description')
                    @endcomponent
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    @slot('title', 'Mix ingredients')
                    <table class="table">
                        <thead>
                            <th>Flavour</th>
                            <th>Units</th>
                            <th>Nicotine</th>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < $rows; $i++)
                                <tr>
                                    <td>
                                        <select name="flavour[{{$i}}][flavour]" class="custom-select">
                                            @foreach ($flavours as $flavour)
                                                <option
                                                    value="{{$flavour->id}}"
                                                    @if ((int)old("flavour.$i.flavour") === $flavour->id)
                                                        selected
                                                    @endif
                                                >
                                                    {{$flavour->name}} ({{$flavour->brand}})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        @component('input-number')
                                            @slot('id', "flavour[$i][units]")
                                            @slot('default', old("flavour.$i.units", 1))
                                            @slot('step', 1)
                                            @slot('min', 1)
                                            @slot('label', '')
                                        @endcomponent
                                    </td>
                                    <td>
                                        @component('input-number')
                                            @slot('id', "flavour[$i][nicotine]")
                                            @slot('default', old("flavour.$i.nicotine", 0))
                                            @slot('step', 0.1)
                                            @slot('min', 0)
                                            @slot('label', '')
                                        @endcomponent
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @component('card')
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            Save
                        </button>
                    </div>
                @endcomponent
            </div>
        </div>
    </form>
@endsection
