<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
    <!--begin::Menu Nav-->
    <ul class="menu-nav">
        <li class="menu-item" aria-haspopup="true">
            <a href="{{route('admin.index')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                <h6>الرئيسية</h6>

            </a>
        </li>
        <li class="menu-section">
{{--            <h4 class="menu-text">Custom</h4>--}}
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>

        @if(auth('admin')->user()->can('admins'))

        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
								        <span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>
                                            <!--end::Svg Icon-->
										</span>
                <span class="menu-text">مديري النظام</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('admin.admins.index')}}" class="menu-link menu-toggle">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">مديري النظام</span>
                            <span class="label label-rounded label-primary">{{\App\Models\Admin::query()->count()}}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if(auth('admin')->user()->can('roles'))

        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                <h6 class="menu-text">الصلاحيات</h6>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Applications</span>
												</span>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('admin.roles.index')}}" class="menu-link menu-toggle">
                            <i class="menu-bullet menu-bullet-line">
                                <span></span>
                            </i>
                            <span class="menu-text">الصلاحيات</span>
                            <span class="menu-label">
                                <span class="label label-rounded label-primary">{{\App\Models\Role::query()->count()}}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        @endif
        @if(auth('admin')->user()->can('drivers'))

        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <circle cx="7" cy="17" r="2" /> <circle cx="17" cy="17" r="2" /> <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" /> <line x1="3" y1="9" x2="7" y2="9" /> </svg>
                                            <!--end::Svg Icon-->
										</span>
                <span class="menu-text">الكباتن</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('admin.drivers.index')}}" class="menu-link menu-toggle">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">الكباتن</span>
                            <span class="label label-rounded label-primary">{{\App\Models\Driver::query()->count()}}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif

        @if(auth('admin')->user()->can('users'))

        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
										  <span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Pictures1.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
													<polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19" />
													<polygon fill="#000000" points="11 19 15 14 19 19" />
													<path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
                                              <!--end::Svg Icon-->
										</span>
                <span class="menu-text">المستخدمين</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('admin.users.index')}}" class="menu-link menu-toggle">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">المستخدمين</span>
                            <span class="label label-rounded label-primary">{{\App\Models\User::query()->count()}}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @if(auth('admin')->user()->can('support'))

        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
								        <span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>
                                            <!--end::Svg Icon-->
										</span>
                <span class="menu-text">الدعم الفني</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Pages</span>
												</span>
                    </li>
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{route('admin.drivers.index')}}" class="menu-link menu-toggle">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">الدعم الفني</span>
                            <span class="label label-rounded label-primary">{{\App\Models\Support::query()->whereNull('adminId')->count()}}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
</ul>
    <!--end::Menu Nav-->
</div>
