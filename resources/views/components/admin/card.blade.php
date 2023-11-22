<div class="card {{ $class ?? "" }}">
    @if(isset($link) || isset($rootLink))
        <a href="@if(isset($rootLink)){{route($rootLink)}} @elseif(isset($link)){{$link}}@endif">
    @endif
    @isset($cardHeader)
        <div class="card-header {{$cardHeaderClass ?? ''}} @if(isset($accordion)) collapsible rotate @endif @isset($borderDashed)border-bottom-dashed @endisset" 
        @if(isset($accordion)) data-bs-toggle="collapse" 
            @foreach ($data as $key => $value)
                data-{{$key}}={{$value}}
            @endforeach
        @endif>
            {{$cardHeader}}
            @if(isset($rightTool))
                @isset($cardToolbar)
                    <div class="card-toolbar {{$toolbarClass ?? ''}}">
                        {{$cardToolbar}}
                    </div>
                @endisset
            @endif
        </div>

    @endisset
    @if(!isset($rightTool))
        @isset($cardToolbar)
            <div class="card-toolbar {{$toolbarClass ?? ''}}">
                {{$cardToolbar}}
            </div>
        @endisset
    @endif
    <div class="card-body {{ $cardBodyClass ?? '' }}@if(isset($noPadding)){{"p-0"}}@endif @if(isset($accordion)) collapse px-0 @endif" @if(isset($accordion)) id={{$bodyId}} @elseif(isset($bodyId)) id={{$bodyId}} @endif>
        {{$cardBody}}
    </div>
    @isset($cardFooter)
        <div class="card-footer {{ $footerClass ?? '' }}">
            {{$cardFooter}}
        </div>
    @endisset
    @if(isset($link) || isset($rootLink))
        </a>
    @endif
</div>