<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{url('/')}}">
            {{-- <img alt="Logo" src="{{asset('image/logo/bepro.png')}}" class="h-25px logo" /> --}}
            &nbsp;
            <span class="text-white fw-bold fs-3 logo">Jamu Pedia  </span>
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
        </div>
    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'dashboard') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'dashboard') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(2) == 'dashboard') active @endif" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Fitur</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'division-position') here show @endif menu-accordion">
                    @if(Gate::check('admin') || Gate::check('customer'))
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M9 6h-2v-2c0-1.104.896-2 2-2h6c1.104 0 2 .896 2 2v2h-2v-1.5c0-.276-.224-.5-.5-.5h-5c-.276 0-.5.224-.5.5v1.5zm7 6v2h8v8h-24v-8h8v-2h-8v-5h24v5h-8zm-2-1h-4v4h4v-4z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Kelas (Course)</span>
                        <span class="menu-arrow"></span>
                    </span>
                    @endif
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'division-position') menu-active-bg @endif">
                        <div class="menu-item">
                            @can('admin')
                            <a class="menu-link @if (Request::Segment(3) == 'list-division') active @endif" href="{{url('/back-admin/course/list-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kelas Berbayar</span>
                            </a>
                            @endcan
                            @can('customer')
                            <a class="menu-link @if (Request::Segment(3) == 'list-division') active @endif" href="{{url('/back-customer/course/paid-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kelas Berbayar</span>
                            </a>
                            @endcan
                        </div>
                        <div class="menu-item">
                            @can('admin')
                            <a class="menu-link @if (Request::Segment(3) == 'add-division') active @endif" href="{{url('/back-admin/course/add-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Kelas</span>
                            </a>
                            @endcan
                            @can('customer')
                            <a class="menu-link @if (Request::Segment(3) == 'add-division') active @endif" href="{{url('/back-customer/course/list-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kelas Saya</span>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                @can('admin')
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'user') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Pengguna (User)</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'user') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-mitra') active @endif" href="{{url('/back-admin/user/list-mitra')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Mitra</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-employee') active @endif" href="{{url('/back-admin/user/list-customer')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Customer</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan


                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'E-Commerce') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M12 4.706c-2.938-1.83-7.416-2.566-12-2.706v17.714c3.937.12 7.795.681 10.667 1.995.846.388 1.817.388 2.667 0 2.872-1.314 6.729-1.875 10.666-1.995v-17.714c-4.584.14-9.062.876-12 2.706zm-10 13.104v-13.704c5.157.389 7.527 1.463 9 2.334v13.168c-1.525-.546-4.716-1.504-9-1.798zm20 0c-4.283.293-7.475 1.252-9 1.799v-13.171c1.453-.861 3.83-1.942 9-2.332v13.704zm-2-10.214c-2.086.312-4.451 1.023-6 1.672v-1.064c1.668-.622 3.881-1.315 6-1.626v1.018zm0 3.055c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0-2.031c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0 6.093c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0-2.031c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm-16-6.104c2.119.311 4.332 1.004 6 1.626v1.064c-1.549-.649-3.914-1.361-6-1.672v-1.018zm0 5.09c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017zm0-2.031c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.316-6-1.626v1.017zm0 6.093c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017zm0-2.031c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">E-Commerce</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course') menu-active-bg @endif">
                        <div class="menu-item">
                            @can('admin')
                            <a class="menu-link @if (Request::Segment(3) == 'list-product') active @endif" href="{{url('/back-admin/product/list-product')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Produk</span>
                            </a>
                            @endcan
                            @can('mitra')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('/back-mitra/E-Commers/list-product')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Produk</span>
                            </a>
                            @endcan
                            @can('mitra')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('/back-mitra/E-Commers/add-product')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Produk</span>
                            </a>
                            @endcan
                            @can('mitra')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('/back-mitra/product/pesanan/history')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Riwayat</span>
                            </a>
                            @endcan
                            @can('customer')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('back-customer/product')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Produk</span>
                            </a>
                            @endcan
                            @can('customer')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('back-customer/product/list-history')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Riwayat</span>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                @if(Gate::check('mitra') || Gate::check('customer'))
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'course-module-content') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M1.8 9l-.8-4h22l-.8 4h-2.029l.39-2h-17.122l.414 2h-2.053zm18.575-6l.604-2h-17.979l.688 2h16.687zm3.625 8l-2 13h-20l-2-13h24zm-8 4c0-.552-.447-1-1-1h-6c-.553 0-1 .448-1 1s.447 1 1 1h6c.553 0 1-.448 1-1z" fill="black" />
                                </svg>                                
                            </span>
                        </span>
                        <span class="menu-title">Transaksi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course-module-content') menu-active-bg @endif">
                        <div class="menu-item">
                            @can('mitra')
                            <a class="menu-link @if (Request::Segment(3) == 'list-course-module-content') active @endif" href="{{url('/back-mitra/product/pesanan')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Transaksi Produk</span>
                            </a>
                            @endcan
                        </div>
                        @can('customer')
                        <div class="menu-item">
                            <a class="menu-link  @if (Request::Segment(3) == 'add-course-module-content') active @endif" href="{{url('/back-customer/transaksi/transaksi-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Transaksi Kelas</span>
                            </a>
                            <a class="menu-link @if (Request::Segment(3) == 'list-course-module-content') active @endif" href="{{url('/back-customer/product/list-product')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Transaksi Produk</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>