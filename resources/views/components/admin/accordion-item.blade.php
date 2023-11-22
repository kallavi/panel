<div class="@if(isset($type2)) accItem @else accordion-item border-0 @endif rounded overflow-hidden {{$accordionItemClass ?? ''}}">
    @if(isset($type2))
        @isset($accHeader)
            <div class="d-flex align-items-center collapsible py-3 toggle mb-0 {{$accHeaderClass ?? ''}} @if(!isset($iconLeft)) justify-content-between @endif"
                @if (isset($data))
                    @foreach ( $data as $key => $value )
                        data-{{ $key }} = "{{ $value }}"
                    @endforeach
                @endif
            >
                @if(isset($iconLeft))
                    @isset($accTitleIconParent)
                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                    @endisset
                        @isset($accTitleIcon)
                            @if (!isset($acctitleIconCustom))
                                @if (isset($accTitleIconTag))
                                    <@if(isset($accTitleIconTag)){{$accTitleIconTag ?? 'i'}}@endif @if(isset($acctitleIconClass))class="{{$acctitleIconClass}}"@endif>
                                    </@if(isset($accTitleIconTag)){{$accTitleIconTag ?? 'i'}}@endif>
                                @else
                                    @isset($icons)
                                        @foreach ($icons as $key => $value )
                                            <i id="{{$key}}" class="{{$value}}">
                                            </i>
                                        @endforeach
                                    @endisset    
                                @endif
                    
                            @else
                            {{$acctitleIconCustom}}
                            @endif
                        @endisset
                    @isset($accTitleIconParent)
                        </div>
                    @endisset
                @endif
                <@if(isset($accTitleTag)){{$accTitleTag}}@else{{"h4"}}@endif @if(isset($accTitleClass))class="{{$accTitleClass}}"@endif>
                    {{ $accTitle ?? '' }}
                </@if(isset($accTitleTag)){{$accTitleTag}}@else{{"h4"}}@endif>
                @if(!isset($iconLeft))
                    @isset($accTitleIconParent)
                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary">
                    @endisset
                        @isset($accTitleIcon)
                            @if (!isset($acctitleIconCustom))
                                @if (isset($accTitleIconTag))
                                    <@if(isset($accTitleIconTag)){{$accTitleIconTag ?? 'i'}}@endif @if(isset($acctitleIconClass))class="{{$acctitleIconClass}}"@endif>
                                    </@if(isset($accTitleIconTag)){{$accTitleIconTag ?? 'i'}}@endif>
                                @else
                                    @isset($icons)
                                        @foreach ($icons as $key => $value )
                                            <i id="{{$key}}" class="{{$value}}">
                                            </i>
                                        @endforeach
                                    @endisset    
                                @endif
                    
                            @else
                            {{$acctitleIconCustom}}
                            @endif
                        @endisset
                    @isset($accTitleIconParent)
                        </div>
                    @endisset
                @endif
            </div>
        @endisset
        @isset($accBody)
            <div id="{{$idBody}}" class="collapse {{$accBodyClass ?? ''}}"
                @if (isset($bodyData))
                    @foreach ( $bodyData as $key => $value )
                        data-{{ $key }} = "{{ $value }}"
                    @endforeach
                @endif
            >
                <!--begin::Text-->
                <div class="mb-4 text-gray-600 fw-semibold fs-6 @if(isset($iconLeft)) ps-10 @endif {{$accBodyContentClass ?? ''}}">{{$accBody}}</div>
                <!--end::Text-->
            </div>
        @endisset
        @isset($seperator)
            <div class="separator {{$seperatorClass ?? 'separator-dashed'}}"></div>
        @endisset
    @else
        @isset($idHeader)
            <h2 class="accordion-header" id="{{$idHeader}}">
                <button class="accordion-button collapsed bg-gray-300 bg-opacity-20 {{$titleClass ?? ' fs-2 fw-bolder'}}" type="button" aria-expanded="true" data-bs-toggle="collapse"
                    @if (isset($data))
                        @foreach ( $data as $key => $value )
                            data-{{ $key }} = "{{ $value }}"
                        @endforeach
                    @endif
                    @if (isset($aria))
                        @foreach ( $aria as $key => $value )
                        aria-{{ $key }} = "{{ $value }}"
                        @endforeach
                    @endif
                 >
                    {{$accTitle}}
                </button>
            </h2>
            <div id="{{$idBody}}" class="accordion-collapse collapse bg-gray-300 bg-opacity-20 {{$bodyClass ?? ''}}"
                @if (isset($ariaBody))
                    @foreach ( $ariaBody as $key => $value )
                        aria-{{ $key }} = "{{ $value }}"
                    @endforeach
                @endif 
                @if (isset($dataBody))
                    @foreach ( $dataBody as $key => $value )
                        data-bs-{{ $key }} = "{{ $value }}"
                    @endforeach
                @endif 
            >
                <div class="accordion-body fs-3 fw-semibold {{$accContentClass ?? ''}}">
                    {{$accContent}}
                </div>
            </div>
        @endisset

    @endif


    {{-- <!--begin::Accordion-->
<div class="accordion" id="kt_accordion_1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_1">
            <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                Accordion Item #1
            </button>
        </h2>
        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

</div> --}}
<!--end::Accordion-->
 
</div>