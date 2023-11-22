@extends('layouts.admin')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Rol Düzenle</h1>

                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted text-hover-primary">Home</a>
                            </li>

                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>

                            <li class="breadcrumb-item text-muted">Rol</li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Düzenle</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title fs-3 fw-bold">Rol Düzenle</div>
                        </div>

                        <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('admin.role.update', $role->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="card-body p-9">

                                <div class="row mb-8">
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Rol Adı</div>
                                    </div>
                                    <div class="col-xl-9 fv-row fv-plugins-icon-container">
                                        <input type="text" class="form-control form-control-solid" name="name" value="{{$role->name}}" required>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">İzinler</div>
                                    </div>
                                    {{-- $permission[3]->roles->where('name',"Editor")->count() --}}
                                    @foreach ($permission as $item)
                                        <div class="col-3 mb-5">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->name }}" {{$item->roles->where('name',$role->name)->count()==1 ?'checked':''}} name="permission[]" id="flexCheckChecked{{$loop->index}}" />
                                                <label class="form-check-label" for="flexCheckChecked{{$loop->index}}">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-danger me-2">Reset</button>

                                    <button type="submit" class="btn btn-info" id="kt_project_settings_submit">Kaydet</button>
                                </div>
                                <input type="hidden">
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @include('backoffice.include.footer')
    </div>
@endsection
