
<form method="{{$method??''}}" class="form {{$class ?? ''}}" action="{{ $action ?? '' }}" style="{{ $style ?? '' }}" enctype="multipart/form-data"
{{--  <form action="@if(isset($actionRoot)) {{route($actionRoot)}} @else $action @endif" method="{{$method??''}}" class="form {{$class ?? ''}}"  --}}
    @if(isset($novalidate)) novalidate="novalidate"@endif
    @if (isset($id)) id="{{$id}}"@endif
    @isset($dataKt)
        @foreach ($dataKt as $key => $value )
            data-kt-{{ $key }} = "{{ $value }}"
        @endforeach
    @endisset
    {{-- @isset($dataKtRoute)
        @foreach ($dataKtRoute as $key => $value )
            data-kt-{{ $key }} = "{{route($value)}}"
        @endforeach
    @endisset --}}
    @isset($dataKtUrl)
            data-kt-redirect-url={{ $dataKtUrl }}
    @endisset>
    {{$form}}
    @csrf
</form>
