@extends('layouts.default')

@section('title', 'Create new mix')

@section('main')
    <div class="container">
        <form method="post" action="{{route('mixes.store')}}">
            {{csrf_field()}}
            @component('input-hidden')
                @slot('id', 'flavours')
                @slot('value', $rows)
            @endcomponent
            <div class="row">
                <div class="col-sm-12">
                    @component('card')
                        @slot('title', 'Mix details')
                        @component('input')
                            @slot('id', 'name')
                            @slot('default', $input['name'] ?? '')
                        @endcomponent
                        @component('input')
                            @slot('id', 'description')
                            @slot('default', $input['description'] ?? '')
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
                                                        @if (isset($input['flavour'][$i]) && (int)$input['flavour'][$i]['flavour'] === $flavour->id)
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
                                                @slot('default', $input['flavour'][$i]['units'] ?? 1)
                                                @slot('step', 1)
                                                @slot('min', 1)
                                                @slot('label', '')
                                            @endcomponent
                                        </td>
                                        <td>
                                            @component('input-number')
                                                @slot('id', "flavour[$i][nicotine]")
                                                @slot('default', $input['flavour'][$i]['nicotine'] ?? 0)
                                                @slot('step', 0.1)
                                                @slot('min', 0)
                                                @slot('label', '')
                                            @endcomponent
                                        </td>
                                    </tr>
                                @endfor
                                <tr>
                                    <td colspan="2">
                                        @component('input-number')
                                            @slot('id', 'add-rows')
                                            @slot('default', 1)
                                            @slot('step', 1)
                                            @slot('min', 1)
                                            @slot('label', '')
                                        @endcomponent
                                    </td>
                                    <td>
                                        <input
                                            type="submit"
                                            name="add-row-button"
                                            class="btn btn-secondary btn-block"
                                            value="Add flavours"
                                        >
                                    </td>
                                </tr>
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
    </div>
@endsection
