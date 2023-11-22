@isset($parentClass)
    <div class="{{ $parentClass }}">
@endisset
<!--Label icin labelTag eklenmeli-->
    @isset($labelTag)
       <@if(isset($labelTag)){{$labelTag}}@endif
           @if (isset($labelClass))
               class="{{ $labelClass }}"
           @endif
           @if (isset($labelFor))
               for="{{ $labelFor }}"
           @endif>
           {{ $labelText ?? '' }}
       </@if (isset($labelTag)){{$labelTag}}@endif>
   @endisset
   <div @if(isset($class)) class="{{$class}}" @endif>
        @if(isset($uploadContainer))
        {{$uploadContainer}}
        @else
        <div class="dropzone upload-container {{ $dropzoneClass ?? '' }}" @if(isset($id)) id="{{$id}}" @else id={{"kt_ecommerce_add_product_media"}} @endif>
            <div class="dz-message needsclick {{ $messageClass ?? '' }}">
                <i class="ki-outline ki-file-up text-primary fs-3x {{ $dropzoneIcon ?? '' }}"></i>
                <div class="ms-4">
                    <h3 class="mb-0 {{$fontClass ?? 'fs-5 fw-bold text-gray-900'}} {{ $dropzoneTitleClass ?? '' }}">@if(isset($dropzoneTitle)){{$dropzoneTitle}}@else Dosyaları buraya bırakın veya yüklemek için tıklayın. @endif</h3>
                    @if(!isset($notSumTitle))
                    <span class="fs-7 fw-semibold text-gray-400 mt-1 {{ $dropzoneSumClass ?? '' }}">@if(isset($dropzoneSumTitle)){{$dropzoneSumTitle}}@else 10 dosyaya kadar yükleme @endif</span>
                    @endif
                </div>
            </div>
            <input class="fileUploadInput {{$fileUploadClass ?? '' }}" type="file"
                @if (isset($name)) name="{{ $name }}" @endif
                @if(isset($id)) id="{{$id}}" @else id={{"file_upload"}} @endif multiple>
        </div>
            @isset($textMuted)
            <div class="text-muted fs-7 {{$textmutedClass ?? '' }}">@if(isset($textmutedtTitle)) {{$textmutedTitle}} @else Set the product media gallery. @endif</div>
            @endisset
        @endif
    </div>

@isset($parentClass)
    </div>
@endisset
    <style type="text/css">
        .upload-container {
            position: relative;
        }
        .fileUploadInput{
            opacity: 0;width:100%;height:100%;top:0;left:0;position:absolute;
        }
    </style>
