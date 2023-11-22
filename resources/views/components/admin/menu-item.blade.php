@if(!isset($menuSub))
<div
    class="menu-item {{ $class ?? '' }} @isset($segment1Acc) @if(isset($segment2Acc)) {{request()->segment(1)==$segment1Acc &&  request()->segment(2)==$segment2Acc  ? 'show':''}} @else {{ request()->segment(1)==$segment1Acc ? 'show':'' }} @endif @endisset" {{ $attributes }} >
    @isset($menuHeading)
        <div class="menu-content menu-heading">{{$menuHeading}}</div>
    @endisset

    @if (!isset($menuHeading))
        <@if(isset($link))a href="@if(isset($menuItemRoot)){{route("$menuItemRoot")}}@else{{$link}}@endif"@else{{"span"}}@endif class="menu-link {{ $linkClass ?? '' }}       @isset($segment1) 
        @if(isset($segment2)) 
            @if(isset($segment3)) {{request()->segment(1)==$segment1 &&  request()->segment(2)==$segment2 && request()->segment(3)==$segment3  ? 'active':''}} 
            @else {{request()->segment(1)==$segment1 &&  request()->segment(2)==$segment2  ? 'active':''}} 
            @endif
        @else {{ request()->segment(1)==$segment1 ? 'active':'' }}
        @endif 
    @endisset"
        >
            @if (!isset($notIcon))
                <@if(isset($iconTag)){{$iconTag}}@else{{"span"}}@endif class="menu-icon {{ $iconClass ?? '' }}"> {{ $iconName ?? '' }}
                    @isset($customIcon)
                        {{$customIcon}}
                    @endisset
                </@if(isset($iconTag)){{$iconTag}}@else{{"span"}}@endif>
            @endif

            <span class="menu-title">{{ $title ?? '' }}</span>
            @isset($badge)
                <span class="menu-badge">
                    <span class="badge {{$bagdeClass ?? 'badge-danger'}}">{{ $badge }}</span>
                </span>
            @endisset
            @isset($menuButton)
                {!! $menuButton !!}
            @endisset
            @if (isset($arrow))
                <span class="menu-arrow"></span>
            @else
                <span style="width: 14px;"></span>
            @endif
        </@if(isset($link)){{"a"}}@else{{"span"}} @endif>

    @endif

    @isset($subMenu)
        <div class="menu-sub menu-sub-accordion {{$subMenuClass??''}}">
            {{$subMenu}}
        </div>
    @endisset
</div>
@else
    @isset($subMenuWrapper)
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
    @endisset
    @if(!isset($subMenuWrapper))
        <div class="menu-item  {{ $class ?? '' }} @isset($segment1Acc) @if(isset($segment2Acc)) {{request()->segment(1)==$segment1Acc &&  request()->segment(2)==$segment2Acc  ? 'show':''}} @else {{ request()->segment(1)==$segment1Acc ? 'show':'' }} @endif @endisset" >
            <a href="@if(isset($menuItemRoot)){{route("$menuItemRoot")}} @elseif(isset($link)){{$link}}@endif" class="menu-link {{ $linkClass ?? '' }} 
            @isset($segment1) 
                @if(isset($segment2)) 
                    @if(isset($segment3)) {{request()->segment(1)==$segment1 &&  request()->segment(2)==$segment2 && request()->segment(3)==$segment3  ? 'active':''}} 
                    @else {{request()->segment(1)==$segment1 &&  request()->segment(2)==$segment2  ? 'active':''}} 
                    @endif
                @else {{ request()->segment(1)==$segment1 ? 'active':'' }}
                @endif 
            @endisset"
                @isset($modalButton)
                data-bs-toggle="modal"
                @endisset
                @isset($data)
                    @foreach ($data as $key => $value )
                        $data-{{$key}}={{$value}}
                    @endforeach
                @endisset
                @isset($dataKt)
                @foreach ($dataKt as $key => $value )
                        $data-kt-{{$key}}={{$value}}
                    @endforeach
                @endisset
            >
                @if (isset($iconTag))
                    <@if(isset($iconTag)){{$iconTag}}@else{{"span"}}@endif class="menu-icon {{ $iconClass ?? '' }}"> {{ $iconName ?? '' }}
                        @isset($customIcon)
                            {{$customIcon}}
                        @endisset
                    </@if(isset($iconTag)){{$iconTag}}@else{{"span"}}@endif>
                @endif
                {{ $title ?? '' }}
                @isset($badge)
                    <span class="menu-badge">
                        <span class="badge {{$bagdeClass ?? 'badge-danger'}}">{{ $badge }}</span>
                    </span>
                @endisset
                @isset($arrow)
                    <span class="menu-arrow"></span>
                @endisset
                @isset($menuButton)
                    {!! $menuButton !!}
                @endisset
            </a>
        </div>
    @endif
    {{$subMenuWrapper ?? ''}}
    @isset($subMenuWrapper)
        </div>
    @endisset
@endif
