@isset($isResponsive)
    <div class="table-responsive {{$parentClass ??''}} data-table">
@endisset

<table id="{{ $id ?? ''}}" class="table {{ $class ?? '' }}">
    @isset($columns)
        <thead class="{{ $theadClass ?? '' }}">
            <tr class="{{ $theadRowClass ?? ''}}">
            {!! $columns !!}
            </tr>
        </thead>
    @endisset
    <tbody class="{{ $tbodyClass ?? '' }}">
       {!! $rows !!}
    </tbody>
</table>

@isset($isResponsive)
    </div>
@endisset