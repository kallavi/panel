<div class="card border-0 card-flush bg-gray-300 bg-opacity-20 py-4">

    <div class="card-header">
        <div class="card-title">
            <h2>Durum</h2>
        </div>
        <div class="card-toolbar">
            <div class="rounded-circle w-15px h-15px statusChange @if (isset($value)) @if ($value == '0')bg-danger @else bg-primary @endif @else bg-primary @endif"
                id="kt_ecommerce_add_product_status"></div>
        </div>
    </div>
    <div class="card-body pt-0">
        <select class="form-select durumSecim">
            <option @if (isset($value) && $value == '1') selected @endif value="1">Yayınlanmış</option>
            <option @if (isset($value) && $value == '0') selected @endif value="0">Pasif</option>
        </select>


    </div>
</div>