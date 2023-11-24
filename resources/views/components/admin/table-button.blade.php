@if(isset($href))
<a link="{{$href}}" class="btn btn-icon btn-sm @isset($type) btn-light-@if($type=="view")success @elseif($type=="delete")danger @elseif($type=="edit")primary @endif @endisset">
    <i class="fs-1 ki-outline @isset($type) ki-@if($type=="view")eye @elseif($type=="delete")trash @elseif($type=="edit")message-edit @endif @endisset"></i>
</a>   
@else
    <button type="button" class="btn btn-icon btn-sm @isset($type) btn-light-@if($type=="view")success @elseif($type=="delete")danger @elseif($type=="edit")primary @endif @endisset">
        <i class="fs-1 ki-outline @isset($type) ki-@if($type=="view")eye @elseif($type=="delete")trash @elseif($type=="edit")message-edit @endif @endisset"></i>
    </button>
@endisset