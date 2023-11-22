@isset($buttonWrapperClass)
    <div class="{{$buttonParentClass}}">
@endisset
    @isset($buttonParentClass)
        <div class="{{$buttonParentClass}}">
    @endisset
    @if(!isset($buttonRouteLink))

        <@if(isset($link)){{"a href=$link" }} @else{{ 'button' }} @endif @if(isset($target)) target="{{ $target }}" @endif @if(isset($id)) id="{{$id}}"@endif class="btn {{$class ?? ''}}@if(isset($small)) {{"btn-sm"}}@endif @if(isset($color))@if(!isset($light)){{"btn-".$color}}@endif @endif @if(isset($light))@if(isset($color)){{"btn-light-".$color}}@else{{"btn-light"}}@endif @endif"
            @isset($type)type="{{ $type }}"@endisset
            @isset($modalButton)
            data-bs-toggle="modal"
            @endisset
            @if (isset($data))
                @foreach ( $data as $key => $value )
                data-{{ $key }} = "{{ $value }}"
                @endforeach
            @endif
            @if(isset($cssColor)) style="color:{{$cssColor}}"@endif>
            @if (!isset($rightIcon))
                @isset($iconTag)
                    <@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif
                        @if (isset($iconClass))
                            class="@if(isset($iconType))ki-{{$iconType ?? 'duotone'}} ki-{{$iconName}}@endif {{$iconClass??''}}"
                        @endif
                        @if(isset($iconTag) == "img")@if(isset($alt))alt="{{$alt}}"@endif @if(isset($src))src="{{$src}}"@endif @endif>

                    </@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif>
                @endisset
            @endif
            {{ $title ?? '' }}
            {{ $buttonContain ?? ''}}
            @if (isset($rightIcon))
                @isset($iconTag)
                    <@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif
                        @if (isset($iconClass))
                            class="ki-{{$iconType ?? 'duotone'}} ki-{{$iconName}} {{$iconClass??''}}"
                        @endif
                        @if(isset($iconTag) == "img")@if(isset($alt))alt="{{$alt}}"@endif @if(isset($src))src="{{$src}}"@endif @endif>

                    </@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif>
                @endisset
            @endif

        </@if(isset($link)){{'a'}}@else{{'button'}} @endif>

    @else

    <a href="{{route($buttonRouteLink)}}" class="btn @if(isset($class)){{$class}}@if(isset($small)) {{"btn-sm"}}@endif @if(isset($color)){{"btn-".$color}}@endif @if(isset($light))@if(isset($color)){{"btn-light-".$color}}@else{{"btn-light"}}@endif @endif @endif"

        @isset($type)
            type="{{ $type }}"
        @endisset
        @isset($modalButton)
        data-bs-toggle="modal"
        @endisset
        @if (isset($data))
            @foreach ( $data as $key => $value )
            data-{{ $key }} = "{{ $value }}"
            @endforeach
        @endif>
        @isset($iconTag)
            <@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif
                @if (isset($iconClass))
                    class="{{ $iconClass }}"
                @endif
                @if(isset($iconTag) == "img")@if(isset($alt))alt="{{$alt}}"@endif @if(isset($src))src="{{$src}}"@endif @endif>

            </@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif>
        @endisset
        {{ $title ?? '' }}
        {{ $buttonContain ?? ''}}

    </a>

    @endif
    @isset($buttonParentClass)
        </div>
    @endisset


@isset($buttonWrapperClass)
    </div>
@endisset
