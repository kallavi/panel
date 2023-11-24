@isset($parentClass)
    <div class="{{ $parentClass }}">
@endisset
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
    <div class="image-input image-input-outline {{$class ?? ''}} @if(isset($placeholderImg))image-input-placeholder @endif @if(isset($emptyImg))image-input-empty @endif" data-kt-image-input="true">
        <div class="image-input-wrapper {{$size ?? 'w-125px h-125px' }}" @if(isset($value))style="background-image: url('{{$value}}')" @endif></div>
            {{-- <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('assets/media/svg/brand-logos/volicity-9.svg')"></div> --}}
       @if(isset($value))
       <label class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow @if(isset($positionCB)) top-100 start-50 translate-middle ms-n5 @endif" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
            <i class="ki-outline ki-pencil fs-7"></i>
            <input type="file"
            name="{{ $name ?? 'image' }}"
            accept=".png, .jpg, .jpeg, .svg">
            <input type="hidden" name="avatar_remove">
        </label>
        <span class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow remove-gallery bottom-0" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
            <i class="ki-outline ki-cross fs-2"></i>
        </span>
        <span class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
            <i class="ki-outline ki-cross fs-2"></i>
        </span>
        @else
        <label class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow @if(isset($positionCB)) top-100 start-50 translate-middle ms-n5 @endif" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
            <i class="ki-outline ki-pencil fs-7"></i>
            <input type="file"
            name="{{ $name ?? 'image' }}"
            accept=".png, .jpg, .jpeg, .svg">
            <input type="hidden" name="avatar_remove">
        </label>
        <span class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
            <i class="ki-outline ki-cross fs-2"></i>
        </span>
       @endif
    </div>
    @isset($textMuted)
        <div class="text-muted fs-7">{{$textMuted}}</div>
    @endisset

     {{ $content ?? '' }}
@isset($parentClass)
    </div>
@endisset

