<div class="form-group">
    @if (!isset($label) || (isset($label) && $label !== ''))
        <label for="{{$id}}">
            {{$label ?? ucfirst($id)}}
        </label>
    @endif
    <input
        type="number"
        name="{{$id}}"
        id="{{$id}}"
        class="form-control"
        step="{{$step ?? 1}}"
        @if (isset($min))
            min="{{$min}}"
        @endif
        @if (isset($max))
            max="{{$max}}"
        @endif
        @if (isset($default) || old($id) !== null)
            value="{{old($id, $default ?? '')}}"
        @endif
        @if (isset($description))
            aria-describedby="{{$id}}-help"
        @endif
    >
    @if (isset($description))
        <small id="{{$id}}-help" class="form-text text-muted">
            {{$description}}
        </small>
    @endif
</div>
