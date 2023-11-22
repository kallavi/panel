
<!--input elamanı dısında 2. bir kapsayıcıya ihtiyac duyuldıgında bır div tag ı ekler baslangıc--->
@isset($inputWrapperClass)
    <div @if (isset($inputWrapperClass)) class="{{ $inputWrapperClass }}" @endif>
@endisset
<!--input elamanı dısında 2. bir kapsayıcıya ihtiyac duyuldıgında bır div tag ı ekler bitiş--->

    <!--input elemanı dışına bir div tag ı ekler açılış baslangıc-->
    @isset($inputParentClass)
        <div @if (isset($inputParentClass)) class="{{ $inputParentClass }} @if(isset($labelRight)) d-flex flex-row-reverse justify-content-end @endif" @endif>
    @endisset
    <!--input elemanı dışına bir div tag ı ekler açılış bitiş-->
    <!--input elemanına label eklemek ıcın labelTag kullanılır baslangıc-->
    @isset($labelTag)
        <@if (isset($labelTag)){{ $labelTag }} @endif
            @if (isset($labelClass)) class="{{$labelClass}}" @endif
            @if (isset($labelFor)) for="{{$labelFor}}" @endif>
            {{ $labelText ?? '' }}
        </@if (isset($labelTag)){{$labelTag}} @endif>
    @endisset

    @isset($inputRow)
        <div class="position-relative d-flex align-items-center {{$inputRowClass ??''}}">
    @endisset
    <!--input elemanına icon eklemek ıcın iconTag kullanılır baslangıc-->
    @isset($iconTag)
        <@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif
            @if (isset($iconType))
                class="ki-{{$iconType}} ki-{{$iconName}} {{$iconClass??''}} {{$iconProp??'ms-4 fs-2'}} @if(isset($iconFixed)) position-absolute @endif"
            @endif
            @if(isset($iconTag) == "img")@if(isset($alt))alt="{{$alt}}"@endif @if(isset($src))src="{{$src}}"@endif @endif>

        </@if(isset($iconTag)){{ $iconTag }} @else{{ 'i' }} @endif>
    @endisset
    <!--type file ise type degerı gonderılmelı-->
    @if (isset($type) && $type == 'file')
        <div class="inputfile-box position-relative w-100">
            <label class="inputFileLabel" for="file">
                <span class="file-button btn btn-icon bg-light-primary me-5">
                    <i class="ki-duotone ki-plus-square fs-1 text-primary">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    </i>
                </span>
                <span class="fs-5 text-gray-800 fw-bolder">Video Ekle</span>
                <span id="file-name" class="file-box d-block w-100 ms-20 mt-2 text-danger"></span>
            </label>
    @endif
    <!--input elemanı baslangıc-->
    {{-- .doc, .docx, .pdf, .txt, .zip, .rar, .csv --}}
    <input @if (isset($type)) type="{{$type}}" @else type="text" @endif
    @if (isset($type) && $type == 'file') class="inputfile d-none" accept="{{$accept ?? ''}}" @endif
        @if (isset($id)) id="{{ $id }}" @endif
        @if (isset($name)) name="{{ $name }}" @endif
        @if (isset($value)) value="{{ $value }}" @endif
        @if (isset($checked)) checked="{{ $checked }}" @endif
        @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
        {{isset($isDisabled) && $isDisabled ? "disabled" : ''}}
        @if (isset($class))
            @if (isset($error))
                class="{{ $class . ' border-danger text-danger' }}"
            @else
                class="{{ $class ?? '' }} @if(isset($iconTag)) ps-12 @endif "
            @endif
        @else
            @if (isset($error))
                class={{"border-danger text-danger"}}
            @else
                @isset($iconTag)
                    class="ps-12 {{ $class??''}}"
                @endisset
            @endif
        @endif
        {{ $attributes }}
        @if (isset($required)) required @endif
        />
    @if (isset($type) && $type == 'file')
        </div>
    @endif
    @isset($inputRow)
        </div>
    @endisset
    <!--input elemanı bbitiş-->

    <!--input elemanı dışına bir div tag ı ekler kapanış baslangıc-->
    @isset($inputParentClass)
        </div>
    @endisset
    <!--input elemanı dışına bir div tag ı ekler kapanış bitiş-->

    <!--input elemanı dışına 2. kapsayıcı ıcın bir div tag ı ekler kapanış baslangıc-->
@isset($inputWrapperClass)
    </div>
@endisset
