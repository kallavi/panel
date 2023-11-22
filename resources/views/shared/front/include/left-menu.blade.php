<div class="leftMenuColumn ps-3 d-none d-lg-block">


    <div class="leftMenu ps-4">

        @php
            $sidebar = $data['menu']->where('slug', request()->segment(3))->first();
        @endphp
        @foreach ($data['menu']->where('child', $sidebar->id) as $submenu)
            @php
                if (is_numeric($submenu->content)) {
                    $routeSub = route('menu.index', ['category' => $sidebar->slug, 'slug' => $submenu->slug]);
                } else {
                    $routeSub = $submenu->content;
                }
            @endphp

            @if (is_numeric($sidebar->content))
                <a href="{{ route('menu.index', ['category' => $sidebar->slug]) }}"
                    class="menu-item {{ $sidebar->slug == request()->segment(3) || request()->segment(3) == null ? 'active' : '' }}"
                    {{ $sidebar->slug == request()->segment(3) ? 'aria-current="true"' : '' }}>{{ $sidebar->name }}</a>
            @endif

            <a href="{{ $routeSub }}" class="menu-item {{ $submenu->slug == request()->segment(4) ? 'active' : '' }}"
                {{ $submenu->slug == request()->segment(4) ? 'aria-current="true"' : '' }}>{{ $submenu->name }}</a>
        @endforeach


        {{-- <a href="{{route('kurumsal')}}" class="menu-item {{request()->segment(1) == 'kurumsal' && request() -> segment(2) == '' ? 'active' : ''}}">Hakkımızda</a>
        <a href="{{route('kurumsal/tanitim-filmi')}}" class="menu-item {{request()->segment(1) == 'kurumsal' && request() -> segment(2) == 'tanitim-filmi' ? 'active' : ''}}">Tanıtım Filmi</a>
        <a href="{{route('kurumsal/insan-kaynaklari')}}" class="menu-item {{request()->segment(1) == 'kurumsal' && request() -> segment(2) == 'insan-kaynaklari' ? 'active' : ''}}">İnsan Kaynakları</a>  --}}
    </div>
    @if (request()->segment(1) == 'kurumsal' && request()->segment(3) == '')
        <div class="o-bg-img d-none d-lg-block">
            <img src="{{ asset('assets/images/static/o-bg.svg') }}" alt="">
        </div>
    @endif

    <div class="wave-bg-img d-none d-lg-block">
        <img src="{{ asset('assets/images/static/wave-bg.svg') }}" alt="">
    </div>
</div>
