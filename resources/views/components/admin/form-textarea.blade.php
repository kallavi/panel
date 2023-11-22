@isset($textareaWrapperClass)
    <div @if (isset($textareaWrapperClass)) class="{{$textareaWrapperClass}}" @endif >
@endisset
    @isset($inputParentClass)
    <div @if (isset($inputParentClass)) class="{{ $inputParentClass }} @if(isset($labelRight)) d-flex flex-row-reverse justify-content-end @endif" @endif>
    @endisset
    @isset($iconTag)
        <@if (isset($iconTag)){{ $iconTag }}@else {{"span"}} @endif @if (isset($iconClass)) class="{{ $iconClass }}" @endif>
        </@if (isset($iconTag)){{ $iconTag }}@else {{"span"}} @endif>
    @endisset
    @isset($labelTag)
        <@if (isset($labelTag)){{ $labelTag }} @endif
            @if (isset($labelClass)) class="{{$labelClass}}" @endif
            @if (isset($labelFor)) for="{{$labelFor}}" @endif>
            {{ $labelText ?? '' }}
        </@if (isset($labelTag)){{$labelTag}} @endif>
    @endisset
        <textarea class="form-control {{ $class ?? '' }}"@if(isset($id)) id="{{$id}}" @endif
            @if(isset($cols)) cols="{{$cols}}"@endif
            @if(isset($rows)) rows="{{$rows}}"@endif
            @if(isset($name)) name="{{ $name }}"@endif
            placeholder="{{$placeholder ?? ''}}"
            @isset($resizeNone)
            data-kt-autosize="true"
            @endisset>{{$textareaContent ?? ''}}</textarea>
    @isset($inputParentClass)
        </div>
    @endisset
@isset($textareaWrapperClass)
    </div>
@endisset
