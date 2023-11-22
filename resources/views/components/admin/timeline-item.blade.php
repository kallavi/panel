@isset($timelineHead)
    <div class="fw-bold mb-6 text-dark">{{$timelineHead}}</div>        
@endisset   
@if(!isset($timelineHead))
    @isset($parentClass)
        <div class="timeline-label {{$parentClass??''}}">
    @endisset

        @if (!isset($item))
            <div class="timeline-item">
                <div class="timeline-label {{$labelClass??''}}">{{$time}}</div>
                <div class="timeline-badge">
                    <i class="fa fa-genderless text-{{$color}} fs-1"></i>
                </div>
                <div class="fw-mormal timeline-content ps-3 @if(!isset($textBold))text-muted @endif">@if(isset($textBold))<span class="{{$textBold}}">{{$text}}</span>@else{{$text}}@endif</div>
            </div>
            @else
            {{$item}}
        @endif



        {{-- <div class="timeline-item">
            <!--begin::Label-->
            <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
            <!--end::Label-->
            <!--begin::Badge-->
            <div class="timeline-badge">
                <i class="fa fa-genderless text-warning fs-1"></i>
            </div>
            <!--end::Badge-->
            <!--begin::Text-->
            <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest. And keep structure</div>
            <!--end::Text-->
        </div>
        <!--end::Item--> --}}
    @isset($parentClass)
        </div>
    @endisset
@endif