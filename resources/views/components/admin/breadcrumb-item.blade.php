@isset($parent)
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-2">
@endisset

@if (!isset($item))
    <li class="breadcrumb-item {{$class ?? ''}}">
            <!--begin::Item-->
        {{--  --}}
        @isset($link)
            <a href="{{$link}}" class="text-gray-700 text-hover-primary me-1">
        @endisset

        @if(isset($icon))
            <i class="ki-outline {{$iconName ?? 'ki-right'}} {{$fontSize ?? 'fs-7'}} text-gray-700 mx-n1"></i>
        @else
            {{$title ?? ''}}
        @endif

        @isset($link)
            </a>
        @endisset
    </li>
@else
    {{$item}}
@endif

@isset($parent)
    </ul>
@endisset