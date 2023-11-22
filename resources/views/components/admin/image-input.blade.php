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
        <div class="image-input-wrapper {{$size ?? 'w-125px h-125px' }}" @if(isset($imgUrl))style="background-image: url('{{$imgUrl}}')" @endif></div>
            {{-- <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('assets/media/svg/brand-logos/volicity-9.svg')"></div> --}}
        @if(isset($changeAvatar))
            <label class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow @if(isset($positionCB)) top-100 start-50 translate-middle ms-n5 @endif" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                <i class="ki-outline ki-pencil fs-7"></i>
                <input type="file"
                @if (isset($name)) name="{{ $name }}" @endif
                accept=".png, .jpg, .jpeg, .svg">
                <input type="hidden" name="avatar_remove">
            </label>
        @endif
        @if(isset($cancelAvatar))
            <span class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                <i class="ki-outline ki-cross fs-2"></i>
            </span>
        @endif
        @if(isset($removaAvatar))
            <span class="btn btn-icon btn-active-color-primary w-25px h-25px bg-white shadow remove-gallery @if(isset($positionCB)) bottom-0 mx-auto start-50 translate-middle ms-6 @else top-0 @endif" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                <i class="ki-outline ki-cross fs-2"></i>
            </span>
        @endif
    </div>
    @isset($textMuted)
        <div class="text-muted fs-7">{{$textMuted}}</div>
    @endisset


        {{-- <div class="image-input image-input-outline {{ $class ?? '' }}" data-kt-image-input="true"
            style="background-image: url('../assets/media/svg/avatars/blank.svg')">
            <div class="image-input-wrapper {{ $size ?? 'w-125px h-125px' }} bgi-position-center"
                style="background-size: 75%; background-image: url('../assets/media/svg/brand-logos/volicity-9.svg')"></div>
            {{ $imageFileInput }}
        </div>  --}}
     {{ $content ?? '' }}
@isset($parentClass)
    </div>
@endisset

