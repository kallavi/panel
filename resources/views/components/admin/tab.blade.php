@isset($tabsType1)
    @isset($tabNavs)
        <ul class="nav nav-tabs nav-line-tabs {{$class ?? ''}}">
            @isset($tabItem)
                @foreach ( $tabItem as $key => $value )
                    <li class="nav-item {{$tabItemClass ?? ''}}">
                        <a class="nav-link text-active-primary {{$tabLinkClass ?? ''}}" 
                            data-bs-toggle="tab" 
                            href="#{{$key}}"
                        >{{$value}}</a>
                    </li>
                @endforeach
            @endisset
        </ul>
    @endisset

    @isset($tabsContent)
    <div class="tab-content" @if(isset($tabsContentId))id="{{$tabsContentId}}"@endif>
    @endisset
        @isset($tabContent)
            @isset($tabData)
                @foreach ( $tabData as $key => $value )
                    <div class="tab-pane fade" id="{{$key}}" role="tabpanel">
                        {{$value}}
                    </div>
                @endforeach
            @endisset
            <div class="tab-pane fade {{$tabPaneClass ?? ''}}" id="{{$tabId}}" role="tabpanel">
                {{$tabContent}}
            </div>
        @endisset
        {{$tabsContent ?? ''}}
    @isset($tabsContent)
    </div>
    @endisset
@endisset

@isset($tabsType2)
    @isset($tabNavs)
        <ul class="nav nav-tabs nav-line-tabs {{$class ?? ''}}">
    @endisset
    @if(isset($tabItem))
        <li class="nav-item {{$tabItemClass ?? ''}}">
            <a href="#{{$tabLink}}" class="nav-link text-active-primary {{$tabLinkClass ?? ''}}"  data-bs-toggle="tab" >{{$title}}</a>
        </li>
    @endif
    @isset($tabNavs)
        </ul>
    @endisset

    @isset($tabsContent)
    <div class="tab-content" @if(isset($tabsContentId))id="{{$tabsContentId}}"@endif>
    @endisset
        @isset($tabContent)
            @isset($tabData)
                @foreach ( $tabData as $key => $value )
                    <div class="tab-pane fade" id="{{$key}}" role="tabpanel">
                        {{$value}}
                    </div>
                @endforeach
            @endisset
            <div class="tab-pane fade {{$tabPaneClass ?? ''}}" id="{{$tabId}}" role="tabpanel">
                {{$tabContent}}
            </div>
        @endisset
        {{$tabsContent ?? ''}}
    @isset($tabsContent)
    </div>
    @endisset
@endisset
