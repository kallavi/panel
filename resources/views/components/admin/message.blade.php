<div class="d-flex py-6 w-100 border-bottom-dashed border-gray-300">
    <i class="ki-outline fs-2x me-5 ms-n1 mt-2 @isset($success)ki-file-added  text-success @endisset @isset($warning)ki-add-files  text-warning @endisset"></i>
    <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center mb-2">
            <a href="@if(isset($routePath)){{route($routePath)}} @else{{$link??''}}@endif" class="text-dark text-hover-primary fs-4 me-3 fw-semibold">{{$message}}</a>
            @isset($badge)
                <span class="badge @if(isset($success))badge-light-success @elseif(isset($warning))bg-light text-muted @endif my-1 ms-auto p-2 fs-9 min-h-25px lh-lg">{{$badge}}</span>
            @endisset
        </div>
        @isset($answer)
        <span class="text-muted fw-semibold fs-6">{{$answer}}</span>
        @endisset
    </div>
</div>