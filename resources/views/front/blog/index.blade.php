@extends('layout.front.layout')

@section('title')
MaviBlog
@endsection
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item static-item px-1 px-lg-0">
            <a href="{{ route('/') }}">Mavi Ofset</a>
        </li>
        <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">MaviBlog</li>
    </ol>
</nav>
@endsection

@section('fluidContent')
    <div class="rightContent pb-5 mb-lg-5 px-lg-0">
        <div class="px-xl-5 px-lg-4 px-4">
            <div class="px-0">
                <div class="cards noBorder type3 row row-cols-1  row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-xl-5 gx-4 gy-1 px-xl-0 px-3 pt-4 mt-lg-0">



                    @foreach ($blog as $item)
                        <div class="col">
                            <div class="card swiper-slide">
                                <a href="{{ route('blog.detail',$item->slug) }}">
                                    <div class="card-image">
                                        <div class="imageWrapper">
                                            <img src="{{ asset($item->image) }}" alt="">
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <p class="card-text pt-lg-1 text-start">{{ $item->name }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
              {{$blog->links()}}
            </div>
        </div>

    </div>
@endsection
