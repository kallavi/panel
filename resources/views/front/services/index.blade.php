@extends('layout.front.layout')
@section('title')
  {{trans('Hizmetler')}} 
@endsection
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item static-item px-1 px-lg-0">
            <a href="{{ route('/') }}">Mavi Ofset</a>
        </li>
        <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{trans('Hizmetler')}}</li>
    </ol>
</nav>
@endsection
@section('fluidContent')
    <div class="rightContent pb-5 mb-lg-5 px-lg-0">
        <div class="px-xl-5 px-lg-4 px-4">
            <div class="px-0">
                <div class="cards type1 row row-cols-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5  px-xl-0 px-3 g-5 pt-3 mt-lg-0">


                    @foreach ($service as $item)
                        <div class="col" data-bs-toggle="modal" data-id="{{ $item->id }}" data-bs-target="#hizmetModal">
                            <div class="card">
                                <div class="card-image">
                                    <div class="imageWrapper">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <span class="card-text pt-1 fw-semibold d-block">{{ $item->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $service->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#hizmetModal').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var buttonId = $(e.relatedTarget).data('id');

            //populate the textbox
            // $(e.currentTarget).find('input[name="bookId"]').val(bookId);

            var fd = new FormData;
            fd.append('id', buttonId);
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: '{{ route('service.detail') }}',
                processData: false,
                contentType: false,
                type: "post",
                data: fd,

                success: function(response) {
                    $('.modal-desc').html(response.desc)
                    $('.modal-title').html(response.title)
                    $('.modal-slider').html(response.gallery)
                   

                }
            })



        });
    </script>
@endsection
