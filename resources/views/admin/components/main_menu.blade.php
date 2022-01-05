<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logo-w">
        <a class="logo" href="index.html">
            <div class="logo-element"></div>
            <div class="logo-label">
                Superior Sulbar
            </div>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w">
                <img alt="" src="{{asset('assets')}}/img/avatar8.png" />
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    {{auth()->user()->name}}
                </div>
                <div class="logged-user-role">

                </div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                        <img alt="" src="{{asset('assets')}}/img/avatar8.png" />
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            {{auth()->user()->name}}
                        </div>
                        <div class="logged-user-role">

                        </div>
                    </div>
                </div>
                <div class="bg-icon">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                   {{-- <li>
                        <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                    </li>

                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                    </li>--}}
                    <li>
                        <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if (false)
    <div class="menu-actions">
        <!--------------------
        START - Messages Link in secondary top menu
        -------------------->
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">
                12
            </div>
            <div class="os-dropdown light message-list">
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar8.png" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    John Mayers
                                </h6>
                                <h6 class="message-title">
                                    Account Update
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar2.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Phil Jones
                                </h6>
                                <h6 class="message-title">
                                    Secutiry Updates
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar3.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Bekky Simpson
                                </h6>
                                <h6 class="message-title">
                                    Vacation Rentals
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar4.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Alice Priskon
                                </h6>
                                <h6 class="message-title">
                                    Payment Confirmation
                                </h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        -------------------->
        <!--------------------
            START - Settings Link in secondary top menu
            -------------------->
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
                <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                </div>
                <ul>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Settings Link in secondary top menu
        --------------------><!--------------------
            START - Messages Link in secondary top menu
            -------------------->
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-zap"></i>
            <div class="new-messages-count">
                4
            </div>
            <div class="os-dropdown light message-list">
                <div class="icon-w">
                    <i class="os-icon os-icon-zap"></i>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar8.png" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    John Mayers
                                </h6>
                                <h6 class="message-title">
                                    Account Update
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar2.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Phil Jones
                                </h6>
                                <h6 class="message-title">
                                    Secutiry Updates
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar3.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Bekky Simpson
                                </h6>
                                <h6 class="message-title">
                                    Vacation Rentals
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="{{asset('assets')}}/img/avatar4.jpg" />
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Alice Priskon
                                </h6>
                                <h6 class="message-title">
                                    Payment Confirmation
                                </h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        -------------------->
    </div>
    <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text" />
    </div>
    @endif
    <h1 class="menu-page-header">
        Page Header
    </h1>
    <ul class="main-menu">
        <li class="sub-header">
            <span></span>
        </li>
        <li class="{{url()->current() === route('admin.dashboard') ? 'active selected' : ''}}">
            <a href="{{route('admin.dashboard')}}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span></a>
        </li>
        <li class="sub-header">
            <span>Room</span>
        </li>
        <li class="{{\Illuminate\Support\Str::contains(url()->current(),route('admin.room')) ? 'active selected' : ''}}">
            <a href="{{route('admin.room')}}">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div>
                <span>Room</span></a>
        </li>
        <li class="{{\Illuminate\Support\Str::contains(url()->current(),route('admin.room')) ? 'active selected' : ''}}">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-credit-card"></div>
                </div>
                <span>Access Room</span></a>
        </li>
        <li class="sub-header">
            <span>Question</span>
        </li>
        <li class="{{\Illuminate\Support\Str::contains(url()->current(),route('admin.question-group')) ? 'active selected' : ''}}">
            <a href="{{route('admin.question-group')}}">
                <div class="icon-w">
                    <div class="os-icon os-icon-documents-03"></div>
                </div>
                <span>Question Group</span></a>
        </li>
        @if (false)
            <li class="sub-header">
                <span>Options</span>
            </li>
        <li class=" has-sub-menu">
            <a href="apps_bank.html">
                <div class="icon-w">
                    <div class="os-icon os-icon-package"></div>
                </div>
                <span>Applications</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">
                    Applications
                </div>
                <div class="sub-menu-icon">
                    <i class="os-icon os-icon-package"></i>
                </div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li>
                            <a href="apps_email.html">Email Application</a>
                        </li>
                        <li>
                            <a href="apps_support_dashboard.html">Support Dashboard</a>
                        </li>
                        <li>
                            <a href="apps_support_index.html">Tickets Index</a>
                        </li>
                        <li>
                            <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                        </li>
                        <li>
                            <a href="apps_projects.html">Projects List</a>
                        </li>
                        <li>
                            <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                        </li>
                    </ul><ul class="sub-menu">
                        <li>
                            <a href="apps_full_chat.html">Chat Application</a>
                        </li>
                        <li>
                            <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                        </li>
                        <li>
                            <a href="misc_chat.html">Popup Chat</a>
                        </li>
                        <li>
                            <a href="apps_pipeline.html">CRM Pipeline</a>
                        </li>
                        <li>
                            <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                        </li>
                        <li>
                            <a href="misc_calendar.html">Calendar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        @endif
    </ul>
    @if (false)
    <div class="side-menu-magic">
        <h4>
            Light Admin
        </h4>
        <p>
            Clean Bootstrap 4 Template
        </p>
        <div class="btn-w">
            <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
        </div>
    </div>
    @endif
</div>
