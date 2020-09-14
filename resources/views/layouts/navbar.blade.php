<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('assets/img/admin-avatar.png')}}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="colors.html">Colors</a>
                    </li>
                    <li>
                        <a href="typography.html">Typography</a>
                    </li>
                    <li>
                        <a href="panels.html">Panels</a>
                    </li>
                    <li>
                        <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                        <a href="tabs.html">Tabs</a>
                    </li>
                    <li>
                        <a href="alerts_tooltips.html">Alerts &amp; Tooltips</a>
                    </li>
                    <li>
                        <a href="badges_progress.html">Badges &amp; Progress</a>
                    </li>
                    <li>
                        <a href="lists.html">List</a>
                    </li>
                    <li>
                        <a href="cards.html">Card</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Forms</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="form_basic.html">Basic Forms</a>
                    </li>
                    <li>
                        <a href="form_advanced.html">Advanced Plugins</a>
                    </li>
                    <li>
                        <a href="form_masks.html">Form input masks</a>
                    </li>
                    <li>
                        <a href="form_validation.html">Form Validation</a>
                    </li>
                    <li>
                        <a href="text_editors.html">Text Editors</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="table_basic.html">Basic Tables</a>
                    </li>
                    <li>
                        <a href="datatables.html">Datatables</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="charts_flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="charts_morris.html">Morris Charts</a>
                    </li>
                    <li>
                        <a href="chartjs.html">Chart.js</a>
                    </li>
                    <li>
                        <a href="charts_sparkline.html">Sparkline Charts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                    <span class="nav-label">Maps</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="maps_vector.html">Vector maps</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Icons</span>
                </a>
            </li>
            <li class="heading">PAGES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="mailbox.html">Inbox</a>
                    </li>
                    <li>
                        <a href="mail_view.html">Mail view</a>
                    </li>
                    <li>
                        <a href="mail_compose.html">Compose mail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Calendar</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                    <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="lockscreen.html">Lockscreen</a>
                    </li>
                    <li>
                        <a href="forgot_password.html">Forgot password</a>
                    </li>
                    <li>
                        <a href="error_404.html">404 error</a>
                    </li>
                    <li>
                        <a href="error_500.html">500 error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
