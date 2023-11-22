@isset($menuColumn)
    <div class="menu menu-rounded menu-column {{$class ?? ''}}" {{$id ?? ''}} {{ $attributes}}>
        {!! $menuColumn !!}
    </div>
@endisset