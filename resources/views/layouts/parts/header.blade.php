<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>



                    <li class="nav-item dropdown dropdown-large">
								<a class=" dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
									{{ __('custom.currentLang')}}
								</a>
								<div class="dropdown-menu dropdown-menu-end " data-bs-popper="static">
									<a href="{{ route('changeLang', 'en') }}">
										<div class="msg-header">
											English
										</div>
									</a>
									<a href="{{ route('changeLang', 'ar') }}">
										<div class="msg-header">
											العربية
                                            </div>
									</a>

								</div>
					</li>




                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth()->user())
                    <img src="{{ asset('assets/upload/user.jpg') }}" class="user-img" alt="user avatar">

                    <div class="user-info ps-3"
                        <p class="user-name mb-0">{{auth()->user()->name}}</p>
                    </div>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end">

                    <li><a class="dropdown-item" href="{{route("home")}}"><i class='bx bx-home-circle'></i><span>{{__("sidebar.dashboard")}}</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                       <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'

                       ></i><span>{{ __('custom.Logout') }}</span></a>
                        <div class="dropdown-item">
                            <form id="logout-form"  action="{{route("logout")}}" method="post">
                                @csrf
                            </form>
                        </div>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
