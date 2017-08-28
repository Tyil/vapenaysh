<div
    class="
        card
        @if (isset($class))
            {{$class}}
        @endif
    "
>
    @if (isset($header))
        <div class="card-header">
            {{$header}}
        </div>
    @endif
    <div class="card-block">
        @if (isset($title))
            <h{{$h ?? 4}} class="card-title">{{$title}}</h4>
        @endif
        <div class="card-text">
            {{$slot}}
        </div>
    </div>
    @if (isset($footer))
        <div class="card-footer text-muted">
            {{$footer}}
        </div>
    @endif
</div>
