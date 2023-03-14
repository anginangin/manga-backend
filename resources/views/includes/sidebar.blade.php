<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Dashboard</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan Web</label>
                </li>
                <li class="nav-item">
                    @php $web = App\Models\Web::first() @endphp
                    <a href="{{ route('edit-setting-web', $web['id']) }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-eye"></i>
                        </span>
                        <span class="pcoded-mtext">Logo & Deskripsi Web</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('theme-color.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Warna Tema</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adds.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        <span class="pcoded-mtext">Iklan (Ads)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        <span class="pcoded-mtext">Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    @php $seo = App\Models\SEO::first() @endphp
                    <a href="{{ route('edit-seo-artikel', $seo['id']) }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-globe"></i>
                        </span>
                        <span class="pcoded-mtext">SEO-Artikel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-globe"></i>
                        </span>
                        <span class="pcoded-mtext">Pages</span>
                    </a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan Homepage FE</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rilisan-terbaru.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        @php $data_3 = App\Models\Title::select('rilisan_terbaru')->first(); @endphp
                        <span class="pcoded-mtext">{{ $data_3->rilisan_terbaru }}</span>
                    </a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        @php $data_4 = App\Models\Title::select('most_view')->first(); @endphp
                        <span class="pcoded-mtext">{{ $data_4->most_view }}</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="{{ route('manga-populer.index') }}">Edit Judul</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider-trending.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        @php $slider_1 = App\Models\Title::select('slider_trending')->first(); @endphp
                        <span class="pcoded-mtext">Slider {{ $slider_1->slider_trending }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sliders.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        @php $slider_2 = App\Models\Title::select('atas_rilisan_terbaru')->first(); @endphp
                        <span class="pcoded-mtext">Slider {{ $slider_2->atas_rilisan_terbaru }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider-recommend.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-image"></i>
                        </span>
                        @php $slider_4 = App\Models\Title::select('rekomendasi')->first(); @endphp
                        <span class="pcoded-mtext">Slider {{ $slider_4->rekomendasi }}</span>
                    </a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Manga</label>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-upload-cloud"></i>
                        </span>
                        <span class="pcoded-mtext">Upload Chapter Manual</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('mangajob') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Manga Job</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manga.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">List Manga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blacklist.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Blacklist Manga</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comment.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">List Comment</span>
                    </a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>User</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('administrator') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Administrator</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Member</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-twitter"></i>
                        </span>
                        <span class="pcoded-mtext">Sosial Media</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="form_elements.html" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Upload Chapter Manual</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Slider Setting</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item pcoded-menu-caption">
                    <label>Web Setting(s)</label>
                </li>
                <li class="nav-item">
                    <a href="form_elements.html" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Logo Web</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="form_elements.html" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-file-text"></i>
                        </span>
                        <span class="pcoded-mtext">Meta Setting</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
