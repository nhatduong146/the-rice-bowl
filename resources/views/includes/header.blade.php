<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>The Rice
            Bowl<br><small>Restaurant</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="{{ url('home') }}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ url('menu') }}" class="nav-link">Thực đơn</a></li>
                <li class="nav-item"><a href="{{ url('service') }}" class="nav-link">Dịch vụ</a></li>
                <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Liên hệ</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                    </li>
                    
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullName }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @if (Auth::user()->fullName == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">{{ __('Trang quản trị') }}</a>
                        </li>
                    @endif
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>
