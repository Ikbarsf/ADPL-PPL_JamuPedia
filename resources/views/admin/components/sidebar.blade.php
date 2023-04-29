<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{url('/')}}">
            <img alt="Logo" src="{{asset('image/logo/bepro.png')}}" class="h-25px logo" />
            &nbsp;
            <span class="text-white fw-bold fs-3 logo">Be Pro</span>
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
                                <span class="menu-title">Dashboard Admin</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Master Data</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'division-position') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M9 6h-2v-2c0-1.104.896-2 2-2h6c1.104 0 2 .896 2 2v2h-2v-1.5c0-.276-.224-.5-.5-.5h-5c-.276 0-.5.224-.5.5v1.5zm7 6v2h8v8h-24v-8h8v-2h-8v-5h24v5h-8zm-2-1h-4v4h4v-4z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Divisi & Jabatan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'division-position') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-division') active @endif" href="{{url('/back-admin/division-position/list-division')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Divisi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-division') active @endif" href="{{url('/back-admin/division-position/add-division')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Divisi</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-position') active @endif" href="{{url('/back-admin/division-position/list-position')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Jabatan</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-position') active @endif" href="{{url('/back-admin/division-position/add-position')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Jabatan</span>
                            </a>
                        </div>
                    </div>
                </div>
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
                            <a class="menu-link @if (Request::Segment(3) == 'list-employee') active @endif" href="{{url('/back-admin/user/list-employee')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Pegawai</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-employee') active @endif" href="{{url('/back-admin/user/add-employee')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Pegawai</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-mentor') active @endif" href="{{url('/back-admin/user/list-mentor')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Mentor</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-mentor') active @endif" href="{{url('/back-admin/user/add-mentor')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Mentor</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Course</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(2) == 'category-course') active @endif" href="{{url('/back-admin/category-course/list-category-course')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M22 0h-17c-1.657 0-3 1.343-3 3v18c0 1.657 1.343 3 3 3h17v-20h-4v8l-2-2-2 2v-8h-8.505c-1.375 0-1.375-2 0-2h16.505v-2z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Kategori Course</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(2) == 'benefit-course') active @endif" href="{{url('/back-admin/benefit-course/list-benefit-course')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.326 18.266l-4.326-2.314-4.326 2.313.863-4.829-3.537-3.399 4.86-.671 2.14-4.415 2.14 4.415 4.86.671-3.537 3.4.863 4.829z" fill="black"/>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Benefit Course</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'course') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M12 4.706c-2.938-1.83-7.416-2.566-12-2.706v17.714c3.937.12 7.795.681 10.667 1.995.846.388 1.817.388 2.667 0 2.872-1.314 6.729-1.875 10.666-1.995v-17.714c-4.584.14-9.062.876-12 2.706zm-10 13.104v-13.704c5.157.389 7.527 1.463 9 2.334v13.168c-1.525-.546-4.716-1.504-9-1.798zm20 0c-4.283.293-7.475 1.252-9 1.799v-13.171c1.453-.861 3.83-1.942 9-2.332v13.704zm-2-10.214c-2.086.312-4.451 1.023-6 1.672v-1.064c1.668-.622 3.881-1.315 6-1.626v1.018zm0 3.055c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0-2.031c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0 6.093c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm0-2.031c-2.119.311-4.332 1.004-6 1.626v1.064c1.549-.649 3.914-1.361 6-1.673v-1.017zm-16-6.104c2.119.311 4.332 1.004 6 1.626v1.064c-1.549-.649-3.914-1.361-6-1.672v-1.018zm0 5.09c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017zm0-2.031c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.316-6-1.626v1.017zm0 6.093c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017zm0-2.031c2.086.312 4.451 1.023 6 1.673v-1.064c-1.668-.622-3.881-1.315-6-1.626v1.017z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Course</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-course') active @endif" href="{{url('/back-admin/course/list-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Course</span>
                            </a>
                        </div>
                        
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'add-course') active @endif" href="{{url('/back-admin/course/add-course')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Course</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'course-module') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M14.568.075c2.202 1.174 5.938 4.883 7.432 6.881-1.286-.9-4.044-1.657-6.091-1.179.222-1.468-.185-4.534-1.341-5.702zm-.824 7.925s1.522-8-3.335-8h-8.409v24h20v-13c0-3.419-5.247-3.745-8.256-3z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Course Modul</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course-module') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-course-module') active @endif" href="{{url('/back-admin/course-module/list-course-module')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Course Modul</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link  @if (Request::Segment(3) == 'add-course-module') active @endif" href="{{url('/back-admin/course-module/add-course-module')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Course Modul</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'course-module-content') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M1.8 9l-.8-4h22l-.8 4h-2.029l.39-2h-17.122l.414 2h-2.053zm18.575-6l.604-2h-17.979l.688 2h16.687zm3.625 8l-2 13h-20l-2-13h24zm-8 4c0-.552-.447-1-1-1h-6c-.553 0-1 .448-1 1s.447 1 1 1h6c.553 0 1-.448 1-1z" fill="black" />
                                </svg>                                
                            </span>
                        </span>
                        <span class="menu-title">Course Modul Konten</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course-module-content') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-course-module-content') active @endif" href="{{url('/back-admin/course-module-content/list-course-module-content')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Modul Konten</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link  @if (Request::Segment(3) == 'add-course-module-content') active @endif" href="{{url('/back-admin/course-module-content/add-course-module-content')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Modul Konten</span>
                            </a>
                        </div>
                    </div>
                </div>  
                <div data-kt-menu-trigger="click" class="menu-item @if (Request::Segment(2) == 'course-module-quiz') here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                    <path opacity="0.5" d="M22 0v13c0 3.419-5.247 3.745-8.256 3 0 0 1.522 8-3.335 8h-8.409v-24h20zm-6.091 18.223c2.047.478 4.805-.279 6.091-1.179-1.494 1.997-5.231 5.707-7.432 6.881 1.155-1.168 1.563-4.234 1.341-5.702zm-4.909-1.223h-5v1h5v-1zm0-2h-5v1h5v-1zm7-2h-12v1h12v-1zm0-2h-12v1h12v-1zm-7.309-3.485l-2.055.002-.39 1.172-1.246.001 2.113-5.689 1.086-.001 2.133 5.686-1.246.001-.395-1.172zm4.373-2.014l1.41-.001.001 1.019-1.41.001.001 1.594-1.074.001-.001-1.594-1.414.001-.001-1.02 1.414-.001-.001-1.527 1.074-.001.001 1.528zm-6.112 1.066l1.422-.001-.717-2.128-.705 2.129z" fill="black" />
                                </svg>                                
                            </span>
                        </span>
                        <span class="menu-title">Course Modul Quiz</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (Request::Segment(2) == 'course-module-quiz') menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (Request::Segment(3) == 'list-course-module-quiz') active @endif" href="{{url('/back-admin/course-module-quiz/list-course-module-quiz')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Modul Quiz</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link  @if (Request::Segment(3) == 'add-course-module-quiz') active @endif" href="{{url('/back-admin/course-module-quiz/add-course-module-quiz')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Modul Quiz</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Admin</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(2) == 'progress-employee') active @endif" href="{{url('/back-admin/progress-employee/list-progress-employee')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M22 0h-17c-1.657 0-3 1.343-3 3v18c0 1.657 1.343 3 3 3h17v-20h-4v8l-2-2-2 2v-8h-8.505c-1.375 0-1.375-2 0-2h16.505v-2z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Penilaian Progress Karyawan</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(2) == 'report-quiz') active @endif" href="{{url('/back-admin/report-quiz/list-report-quiz')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path opacity="0.5" d="M22 0h-17c-1.657 0-3 1.343-3 3v18c0 1.657 1.343 3 3 3h17v-20h-4v8l-2-2-2 2v-8h-8.505c-1.375 0-1.375-2 0-2h16.505v-2z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Nilai Karyawan</span>
                    </a>
                </div>
                

                {{-- 
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                    <path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Testimoni</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tambah Testimoni</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Testimoni</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="#" title="Build your layout and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Product Review</span>
                    </a>
                </div>
                
                <div class="menu-item">
                    <div class="menu-content">
                        <div class="separator mx-1 my-4"></div>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                    <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Dokumentasi API</span>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>