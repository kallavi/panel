
    @isset($tagsWrapper)
        <@if(isset($tags)){{$tags}} @elseif(isset($link) || isset($rootLink)) a href="@if(isset($rootLink)){{route($rootLink)}} @elseif(isset($link)){{$link}}@endif" @else{{"div"}}@endif 
            @if (isset($class)) class="{{$class}}" @endif 
            @if (isset($id)) id="{{$id}}" @endif 
            {{$attributes}}
        >
            {{$title ?? ''}}
            {{$tagsWrapper}}
        </@if(isset($tags)){{$tags}} @elseif(isset($link) || isset($rootLink)) {{"a"}} @else{{"div"}}@endif >
    @endisset

    @isset($symbol)
        <div class="symbol {{$class??''}}">
            @isset($symbolLabel)
                <span class="symbol-label {{ $symbolLabelClass ?? '' }}@if(isset($noneBg))bg-opacity-0 @endif"> 
                    @isset($iconClass)
                        <@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif
                            @if (isset($iconClass))
                                class="{{ $iconClass }}"
                            @endif
                            @if(isset($iconTag) == "img")@if(isset($alt))alt="{{$alt}}"@endif @if(isset($src))src="{{$src}}"@endif @endif>
                            {{$iconPart ?? ''}}
                        </@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif>
                    @endisset
                </span>
            @endisset
        </div>
    @endisset