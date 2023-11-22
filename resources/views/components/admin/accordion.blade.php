<div class="accordion @if(isset($accToggle)) accordion-icon-toggle pe-md-10 mb-10 mb-md-0 @endif {{$class ?? ''}}" @if(isset($id))id="{{$id}}"@endif>
    {{$accContentTitle ?? ''}}
    {{$accContent}}
</div>