@extends('layout.front.layout')
@section('title')
    {{trans('Kurumsal')}}
@endsection
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item static-item px-1 px-lg-0">
                <a href="{{ route('/') }}">Mavi Ofset</a>
            </li>
            <li class="breadcrumb-item static-item px-1 px-lg-0">
                <a href="{{ route('/') }}">{{ $data['menu']->where('slug', request()->segment(3))->first()->name }}</a>
            </li>
            <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{ $page->name }}</li>
            {{-- <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{ $page->name }}</li> --}}
        </ol>
    </nav>
@endsection
{{-- @section('breadcrumbs')
    <div class="d-lg-flex align-items-center px-4 text-center text-lg-start">
        <div class="title text-center text-lg-start">
            <h1>Hizmetler</h1>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-2">
                <li class="breadcrumb-item static-item px-1 px-lg-0">
                    <a href="{{ route('/') }}">Mavi Ofset</a>
                </li>
                <li class="breadcrumb-item static-item px-1 px-lg-0">
                    <a href="{{ route('/') }}">{{ $data['menu']->where('slug', request()->segment(2))->first()->name }}</a>
                </li>
                <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{ $page->name }}</li>
            </ol>
        </nav>
    </div>
@endsection --}}
@section('content')
    <div class="rightContent ps-lg-5 pt-lg-5 pt-4 mt-lg-3 px-lg-0">
        <div class="mx-0 align-items-start px-xl-5 px-lg-4 px-4">
            <div class="ps-lg-3">
                <h3 class="text-center text-lg-start">{{trans('Hakkımızda')}}</h3>
                <div class="row">
                    <div class="col">
                        <div class="paragraph pb-2">
                            {!! $page->description !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
