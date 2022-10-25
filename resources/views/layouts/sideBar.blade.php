 <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset("dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{Helper::GeneralSiteSettings('name')}}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->photo ? asset('uploads/users/'.Auth::user()->photo) : asset('uploads/users/user.webp') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link @yield('home')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                  الرئيسية
                            </p>
                            </a>
                        </li>

                        @if (Auth::user()->level == "1")
                            <li class="nav-item has-treeview  @yield('company_open')">
                                <a href="#" class="nav-link @yield('company')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    شركات التـأمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('company.index')}}" class="nav-link @yield('company_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الشركات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('company.create')}}" class="nav-link @yield('company_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة شركة جديدة</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview  @yield('clinic_open')">
                                <a href="#" class="nav-link @yield('clinic')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    العيادات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('clinic.index')}}" class="nav-link @yield('clinic_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل العيادات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('clinic.create')}}" class="nav-link @yield('clinic_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة عيادة جديدة</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview  @yield('pharmacy_open')">
                                <a href="#" class="nav-link @yield('pharmacy')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الصيدليات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('pharmacy.index')}}" class="nav-link @yield('pharmacy_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الصيدليات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pharmacy.create')}}" class="nav-link @yield('pharmacy_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة صيدلية جديدة</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview  @yield('report_open')">
                                <a href="#" class="nav-link @yield('report')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    التقارير
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >

                                    <li class="nav-item">
                                        <a href="{{route('report.clinic')}}" class="nav-link @yield('report_clinic')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>العيادات</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('report.pharmacy')}}" class="nav-link @yield('report_pharmacy')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الصيدليات</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->level == "2")

                            <li class="nav-item">
                                <a href="{{route('company.select')}}" class="nav-link @yield('select')">
                                <i class="nav-icon  fas fa-th"></i>
                                <p>
                                    شركات التأمين
                                </p>
                                </a>
                            </li>

                              <li class="nav-item has-treeview  @yield('doctor_open')">
                                <a href="#" class="nav-link @yield('doctor')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الاطباء
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('doctor.index')}}" class="nav-link @yield('doctor_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الاطباء</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('doctor.create')}}" class="nav-link @yield('doctor_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة طبيب جديد</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>




                             {{-- <li class="nav-item has-treeview  @yield('report_open')">
                                <a href="#" class="nav-link @yield('report')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    التقارير
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >

                                    <li class="nav-item">
                                        <a href="{{route('report.medicine')}}" class="nav-link @yield('report_medicine')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الادوية</p>
                                        </a>
                                    </li>


                                </ul>
                            </li> --}}

                        @endif

                        {{-- <li class="nav-item">
                            <a href="{{route('setting')}}" class="nav-link @yield('setting')">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                الاعدادات العامة
                            </p>
                            </a>
                        </li> --}}


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
