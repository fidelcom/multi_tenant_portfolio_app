<div class="header-dashboard">
    <div class="wrap">
        <div class="header-left">
            <a href="index.html">
                <img class="" id="logo_header_mobile" alt="" src="{{ asset('admin/images/logo/logo.png') }}" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" data-width="154px" data-height="52px" data-retina="images/logo/logo@2x.png">
            </a>
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
        </div>
        <div class="header-grid">
{{--            <div class="header-item country">--}}
{{--                <select class="image-select no-text">--}}
{{--                    <option data-thumbnail="{{ asset('admin/images/country/1.png') }}">ENG</option>--}}
{{--                    <option data-thumbnail="{{ asset('admin/images/country/9.png') }}">VIE</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="header-item button-dark-light">
                <i class="icon-moon"></i>
            </div>
            <div class="popup-wrap noti type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1" >
                        <li>
                            <h6>Message</h6>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('admin/images/avatar/user-11.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Cameron Williamson</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Hello?</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('admin/images/avatar/user-12.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Ralph Edwards</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Are you there?  interested i this...</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('admin/images/avatar/user-13.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Eleanor Pena</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Interested in this loads?</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image">
                                    <img src="{{ asset('admin/images/avatar/user-11.png') }}" alt="">
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="body-title">Jane Cooper</a>
                                        <div class="time">10:13 PM</div>
                                    </div>
                                    <div class="text-tiny">Okay...Do we have a deal?</div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#" class="tf-button w-full">View all</a></li>
                    </ul>
                </div>
            </div>
            <div class="popup-wrap message type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-message-square"></i>
                                            </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2" >
                        <li>
                            <h6>Notifications</h6>
                        </li>
                        <li>
                            <div class="message-item item-1">
                                <div class="image">
                                    <i class="icon-noti-1"></i>
                                </div>
                                <div>
                                    <div class="body-title-2">Discount available</div>
                                    <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="message-item item-2">
                                <div class="image">
                                    <i class="icon-noti-2"></i>
                                </div>
                                <div>
                                    <div class="body-title-2">Account has been verified</div>
                                    <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus et</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="message-item item-3">
                                <div class="image">
                                    <i class="icon-noti-3"></i>
                                </div>
                                <div>
                                    <div class="body-title-2">Order shipped successfully</div>
                                    <div class="text-tiny">Integer aliquam eros nec sollicitudin sollicitudin</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="message-item item-4">
                                <div class="image">
                                    <i class="icon-noti-4"></i>
                                </div>
                                <div>
                                    <div class="body-title-2">Order pending: <span>ID 305830</span></div>
                                    <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#" class="tf-button w-full">View all</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-item button-zoom-maximize">
                <div class="">
                    <i class="icon-maximize"></i>
                </div>
            </div>
            <div class="popup-wrap user type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->photo) }}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{ \Illuminate\Support\Facades\Auth::user()->username }}</span>
                                                    <span class="text-tiny">{{ \Illuminate\Support\Facades\Auth::user()->role }}</span>
                                                </span>
                                            </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                        <li>
                            <a href="{{ route('admin.profile.home') }}" class="user-item">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="body-title-2">Account</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="body-title-2">Inbox</div>
                                <div class="number">27</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-file-text"></i>
                                </div>
                                <div class="body-title-2">Taskboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="setting.html" class="user-item">
                                <div class="icon">
                                    <i class="icon-settings"></i>
                                </div>
                                <div class="body-title-2">Setting</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-headphones"></i>
                                </div>
                                <div class="body-title-2">Support</div>
                            </a>
                        </li>
                        <li>
                            <a href="login.html" class="user-item">
                                <div class="icon">
                                    <i class="icon-log-out"></i>
                                </div>
                                <div class="body-title-2">Log out</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
