@isset($inputParentClass)
<div @if (isset($inputParentClass)) class="{{ $inputParentClass }} @if(isset($labelRight)) d-flex flex-row-reverse justify-content-end @endif" @endif>
@endisset

@isset($labelTag)
    <@if (isset($labelTag)){{ $labelTag }} @endif
        @if (isset($labelClass)) class="{{$labelClass}}" @endif
        @if (isset($labelFor)) for="{{$labelFor}}" @endif>
        {{ $labelText ?? '' }}
    </@if (isset($labelTag)){{$labelTag}} @endif>
@endisset
<select
    @if (isset($class)) class="{{$class}} form-select" @else class={{"form-select"}} @endif
    @if (isset($id)) class="{{$id}}"@endif
    @if (isset($name)) name="{{ $name }}" @endif
    @if (isset($data))
        @foreach ( $data as $key => $value )
        data-{{ $key }} = "{{ $value }}"
        @endforeach
    @endif
    @if(isset($attr))
        @foreach ( $attr as $key => $value )
            {{ $key }}  = "{{ $value }}"
        @endforeach
    @endif
    {{$disabled ?? ''}}
    >
    @isset($options)

        @foreach ($options as $key => $value )
            <option {{ isset($defaultValue) && $defaultValue==$key ? "selected" : "" }} value="{{ $key }}">{{ $value }}</option>
        @endforeach
    @endisset
    @isset($customOptions)
        {{ $customOptions }}
    @endisset

</select>

@isset($inputParentClass)
</div>
@endisset
