<div class="form-group">
    @if (!isset($label) || (isset($label) && $label !== ''))
        <label for="{{$id}}">
            {{$label ?? ucfirst($id)}}
        </label>
    @endif
    <input
        type="{{$type ?? 'text'}}"
        name="{{$id}}"
        id="{{$id}}"
        class="form-control"
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
