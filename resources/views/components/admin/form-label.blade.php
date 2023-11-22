@isset($titleParent)
    <div @if (isset($titleParent)) class="{{ $titleParent }}" @endif>
@endisset


@isset($title)
    <@if (isset($titleTag)){{ $titleTag }}@else{{"div"}} @endif class="{{ $class ?? '' }}" {{ $attributes ?? '' }} > 
    {{$title}}
    </@if (isset($titleTag)){{ $titleTag }}@else{{"div"}} @endif>
@endisset

@isset($titleParent)
    </div>
@endisset