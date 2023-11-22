<div @if(isset($id)) id='{{$id}}'@endif class="app-container {{$class ?? ''}}">
    {!! $contentContainer !!}
</div>