<button
    class="
        btn
        btn-{{$style ?? 'primary'}}
        @if (isset($class))
            {{$class}}
        @endif
    "
    @if (isset($type))
        type="{{$type}}"
    @endif
>
    @if (isset($icon))
        <i class="fa fa-{{$icon}}"></i>
    @endif
    {{$slot}}
</button>
