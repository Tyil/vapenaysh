<div class="card">
    <div class="card-block">
        @if (isset($title))
            <h4 class="card-title">{{$title}}</h4>
        @endif
        <div class="card-text">
            {{$slot}}
        </div>
    </div>
</div>
