<tr>
    <td>
        <select class="custom-select">
            @foreach ($flavours as $flavour)
                <option value="{{$flavour->id}}">
                    {{$flavour->name}} ({{$flavour->brand}})
                </option>
            @endforeach
        </select>
    </td>
    <td>
        @component('input-number')
            @slot('id', 'flavour[][units]')
            @slot('type', 'number')
            @slot('default', 1)
            @slot('step', 1)
            @slot('min', 1)
            @slot('label', '')
        @endcomponent
    </td>
    <td>
        @component('input-number')
            @slot('id', 'flavour[][nicotine]')
            @slot('type', 'number')
            @slot('default', 0)
            @slot('step', 0.1)
            @slot('min', 0)
            @slot('label', '')
        @endcomponent
    </td>
</tr>
