<footer>
    {{-- <footer class="{{request()->segment(1) == 'iletisim' ? 'noBefore' : ''}}"> --}}
    <div class="bg-primary-dark top px-xl-4 px-lg-3 px-3">
        <div class="footer-col-items col-xl-10 col-12 mx-auto px-lg-3 px-4 h-100 d-flex hstack pb-5">
            <div class="col colItem adressCol d-lg-flex d-none">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;">
                            {{__('İLETİŞİM')}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark show bg-transparent border-0 p-lg-0">
                            <li><a class="dropdown-item" href="https://maps.app.goo.gl/7a6LhhfndRXJ2HLi8" target="_blank">
                                    {{ $data['setting']['address'] }}</a></li>
                            <li><a class="dropdown-item" href="mailto:{{ $data['setting']['e_mail'] }}">{{ $data['setting']['e_mail'] }}</a></li>
                            <li><a class="dropdown-item" href="callto:+{{ $data['setting']['phone'] }}">{{ $data['setting']['phone'] }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col colItem d-lg-flex d-none">
                <ul class="navbar-nav menu-list-kurumsal">

                    @foreach ($data['menu']->where('child', null)->where('parent', 2) as $item)
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
                            <a class="nav-link" href="{{$route}}">
                                {{ $item->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark show bg-transparent border-0 p-lg-0">
                                @foreach ($data['menu']->where('child', $item->id) as $submenu)
                                    @php
                                        if (is_numeric($submenu->content)) {
                                            $routeSub = route('menu.index', ['category' => $item->slug, 'slug' => $submenu->slug]);
                                        } else {
                                            $routeSub = $submenu->content;
                                        }
                                    @endphp

                                    <li><a class="nav-link" href="{{$routeSub}}">{{ $submenu->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach



                 




                </ul>
            </div>
            <div class="col colItem d-lg-flex d-none">
                <ul class="navbar-nav menu-list-hizmet">
                        @foreach ($data['menu']->where('child', null)->where('parent', 3) as $item)
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
                            <a class="nav-link" href="{{$route}}">
                                {{ $item->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark show bg-transparent border-0 p-lg-0">
                                @foreach ($data['menu']->where('child', $item->id) as $submenu)
                                    @php
                                        if (is_numeric($submenu->content)) {
                                            $routeSub = route('menu.index', ['category' => $item->slug, 'slug' => $submenu->slug]);
                                        } else {
                                            $routeSub = $submenu->content;
                                        }
                                    @endphp

                                    <li><a class="nav-link" href="{{$routeSub}}">{{ $submenu->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col colItem logoCol">
                <div class="pt-lg-2">
                    <img width="58px" src="{{ asset('assets/images/static/logos/iso.svg') }}" alt="">
                </div>
                <div class="pt-lg-5">
                    <img width="58px" src="{{ asset('assets/images/static/logos/iso.svg') }}" alt="">
                </div>
            </div>
            <div class="col colItem languageCol mt-lg-3">
                <div class="footerImage">
                    <img width="200px" src="{{ asset('assets/images/static/logos/logo-light.svg') }}" alt="">
                </div>
                <div class="socialMedia pt-4 pb-3 text-center">
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
                        <a href="https://wa.me/{{ $data['setting']['whatsapp'] }}" target="_blank">
                            <i class="icon-whatsapp customIcon"></i>
                        </a>
                    @endif
                </div>
                <div class="languageWrapper d-lg-flex d-none">
                    <div class="dropdown languageButton p-0">
                        <button class="btn btn-light dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{request()->segment(1)=='tr'?'Türkçe':''}}
                            {{request()->segment(1)=='en'?'English':''}}
                            {{request()->segment(1)=='ar'?'العربية':''}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{request()->segment(1)=='tr'?'selected':''}}" data-value="Tr" href="{{ route('change.lang', ['local'=>'tr']) }}">TÜRKÇE</a>
                            </li>
                            <li><a class="dropdown-item {{request()->segment(1)=='en'?'selected':''}}" data-value="En" href="{{ route('change.lang', ['local'=>'en']) }}">ENGLISH</a></li>
                            <li><a class="dropdown-item {{request()->segment(1)=='ar'?'selected':''}}" data-value="Ar" href="{{ route('change.lang', ['local'=>'ar']) }}">العربية</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="col-xl-10 col-12 mx-auto px-lg-3 px-4 h-100 d-flex align-items-center justify-content-center">
            <div class="copyRight">
                <span>© {{ date('Y') }} MaviOfset.com</span>
            </div>
        </div>
    </div>
</footer>
