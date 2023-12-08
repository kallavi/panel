<div class="{{$size ?? 'w-125px h-75px'}} overflow-hidden @if(isset($rounded)){{"rounded-".$rounded}}@else rounded @endif {{$class ?? ''}}">
    <img class="object-fit-contain img-fluid min-h-100 h-100" src="{{asset($imgPath)}}" alt=""">
</div>
