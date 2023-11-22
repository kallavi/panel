<div class="modal fade" tabindex="-1" id="{{$id}}">
    <div class="modal-dialog modal-dialog-centered @if(isset($xl)) modal-xl @elseif(isset($lg)) modal-lg @elseif(isset($sm)) modal-sm @endif">
        <div class="modal-content">
            @isset($modalTitle)

                <div class="modal-header @if(isset($headerNotBorder))border-0 @endif {{$headerClass ??''}}">
                    <!--begin::Close-->
                    @isset($textMuted)
                        <div>
                    @endisset
                    <h3 class="modal-title @if(isset($titleCenter))w-100 text-center ps-3 @endif">{{$modalTitle}}</h3>
                    @isset($textMuted)
                        <div class="text-muted fw-semibold fs-5">
                            {{$textMuted}}
                        </div>
                    </div>
                    @endisset
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
            @endisset


            <div class="modal-body px-18">

                {{$modalBody ?? ''}}
            </div>
            @isset($modalFooter)
                <div class="modal-footer @if(isset($footerNotBorder))border-0 @endif {{$footerClass ?? ''}}">{{$modalFooter}}</div>
            @endisset
            {{ $content ?? '' }}
        </div>
    </div>
</div>
