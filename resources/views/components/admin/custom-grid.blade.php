@isset($gridRow)
    <div class="row {{$rowClass ?? ''}} @if(isset($rowCols))col-{{$rowCols}}@endif @if(isset($rowColsXxl))col-xxl-{{$rowColsXxl}}@endif  @if(isset($rowColsXl))col-xl-{{$rowColsXl}}@endif @if(isset($rowColsLg))col-lg-{{$rowColsLg}}@endif @if(isset($rowColsMd))col-md-{{$rowColsMd}}@endif @if(isset($rowColsSm))col-sm-{{$rowColsSm}}@endif">
        {{$gridRow}}
    </div>
@endisset

@isset($gridCol)
    <div class="{{$colClass ?? ''}} @if(isset($col))col-{{$col}}@endif @if(isset($colXxl))col-xxl-{{$colXxl}}@endif @if(isset($colXl))col-xl-{{$colXl}}@endif @if(isset($colLg))col-lg-{{$colLg}}@endif @if(isset($colMd))col-md-{{$colMd}}@endif @if(isset($colSm))col-sm-{{$colSm}}@endif">
        {{$gridCol}}
    </div>
@endisset