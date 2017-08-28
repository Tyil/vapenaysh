<div class="form-group">
    <label for="{{$id}}">{{$label ?? ucfirst($id)}}</label>
    <textarea
        id="{{$id}}"
        name="{{$id}}"
        class="
            form-control
            @if (isset($class))
                {{$class}}
            @endif
        "
        @if (isset($rows))
            rows="{{$rows}}"
        @endif
    >{{isset($default) ? $default : ''}}</textarea>
</div>
