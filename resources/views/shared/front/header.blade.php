<header class="p-xl-4 p-lg-3 px-3 py-2 py-lg-0 {{ request()->segment(2) != '' ? 'subHeader' : '' }}">
    <div class="col-xxl-10 col-12 mx-auto py-2 pt-lg-1 pb-lg-0 px-lg-3 px-4">
        <nav class="navbar navbar-expand-lg ps-lg-2">
            <div class="container-fluid pt-lg-1 pt-lg-4 px-0">
                <a class="navbar-brand me-xl-4 px-lg-2 pe-lg-2 ps-lg-0" href="{{ route('/') }}">
                    <img class="lightImg" src="{{ asset($data['setting']['logo']) }}" alt="">
                    <img class="darkImg" src="{{ asset($data['setting']['dark_logo']) }}" alt="">
                </a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ps-xl-1" id="navbarSupportedContent">
                    <!----Web Menü-->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-xxl-5 d-none d-lg-flex">


                        @foreach ($data['menu']->where('child', null)->where('parent', 1) as $item)
                            @php
                                if ($item->content == null) {
                                    $route = 'javascript:;';
                                } elseif (is_numeric($item->content)) {
                                    $route = route('menu.index', ['category' => $item->slug]);
                                } else {
                                    $route = $item->content;
                                }
                            @endphp

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ $route }}">
                                    {{ $item->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">

                                    @foreach ($data['menu']->where('child', $item->id) as $submenu)
                                        @php
                                            if (is_numeric($submenu->content)) {
                                                $routeSub = route('menu.index', ['category' => $item->slug, 'slug' => $submenu->slug]);
                                            } else {
                                                $routeSub = $submenu->content;
                                            }
                                        @endphp

                                        <li><a class="dropdown-item" href="{{ $routeSub }}">{{ $submenu->name }}</a></li>
                                    @endforeach
                                    {{-- <li><a class="dropdown-item" href="{{ route('kurumsal/tanitim-filmi') }}">Tanıtım Filmi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('kurumsal/insan-kaynaklari') }}">İnsan Kaynakları</a> --}}
                            </li>
                    </ul>
                    </li>
                    @endforeach




                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('service.index') }}">{{ trans('Hizmetlerimiz') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">{{ trans('Blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('iletisim') }}">{{ trans('Bize Ulaşın') }}</a>
                    </li>
                    <li class="nav-item pt-5 d-block d-lg-none">
                        <a class="nav-link" href="javascript:;">ENGLISH</a>
                    </li>
                    </ul>


                    <!----Mobil Menü-->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-xxl-5 d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('/') }}">{{__('Anasayfa')}}</a>
                        </li>




                        @foreach ($data['menu']->where('child', null)->where('parent', 1) as $item)
                            @php
                                if ($item->content == null) {
                                    $route = 'javascript:;';
                                } elseif (is_numeric($item->content)) {
                                    $route = route('menu.index', ['category' => $item->slug]);
                                } else {
                                    $route = $item->content;
                                }
                            @endphp
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    @foreach ($data['menu']->where('child', $item->id) as $submenu)
                                        @php
                                            if (is_numeric($submenu->content)) {
                                                $routeSub = route('menu.index', ['category' => $item->slug, 'slug' => $submenu->slug]);
                                            } else {
                                                $routeSub = $submenu->content;
                                            }
                                        @endphp
                                        <li><a class="dropdown-item" href="{{ $routeSub }}">{{ $submenu->name }}</a></li>
                                    @endforeach
                                    {{-- <li><a class="dropdown-item" href="{{ route('kurumsal/tanitim-filmi') }}">Tanıtım Filmi</a></li>
                                <li><a class="dropdown-item" href="{{ route('kurumsal/insan-kaynaklari') }}">İnsan Kaynakları</a>   </li> --}}

                                </ul>
                        @endforeach
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('service.index') }}">{{ trans('Hizmetlerimiz') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index') }}">{{ trans('Blog') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('iletisim') }}">{{ trans('Bize Ulaşın') }}</a>
                        </li>
                        <li class="nav-item language-nav pt-5 d-flex align-items-center d-lg-none">
                            @if (request()->segment(1) != 'tr')
                                <a class="nav-link" href="{{ route('change.lang', ['local'=>'tr']) }}">TR</a>
                                <a class="nav-link">/</a>
                            @endif
                            @if (request()->segment(1) != 'en')
                                <a class="nav-link" href="{{ route('change.lang', ['local'=>'en']) }}">EN</a>
                                <a class="nav-link">/</a>
                            @endif
                            @if (request()->segment(1) != 'ar')
                                <a class="nav-link" href="{{ route('change.lang', ['local'=>'ar']) }}">AR</a>
                            @endif
                        </li>
                    </ul>

                    <div class="socialMedia row row-cols-4 d-none d-lg-flex pe-2 gx-3">
                        @if ($data['setting']['facebook'])
                            <a href="https://www.facebook.com/{{ $data['setting']['facebook'] }}" target="_blank">
                                <i class="icon-facebook customIcon"></i>
                            </a>
                        @endif
                        @if ($data['setting']['twitter'])
                            <a href="https://www.twitter.com/{{ $data['setting']['twitter'] }}" target="_blank">
                                <i class="icon-twitter customIcon"></i>
                            </a>
                        @endif
                        @if ($data['setting']['instagram'])
                            <a href="https://www.instagram.com/{{ $data['setting']['instagram'] }}" target="_blank">
                                <i class="icon-instagram customIcon"></i>
                            </a>
                        @endif
                        @if ($data['setting']['whatsapp'])
                            <a href="https://wa.me/{{ $data['setting']['facebook'] }}" target="_blank">
                                <i class="icon-whatsapp customIcon"></i>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
