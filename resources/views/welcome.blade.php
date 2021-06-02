<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Western Sydney University') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        h3, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ url('/') }}">
                <div><img src="/svg/wsuimage.png" style="height: 30px; border-right: 1px solid black" class="pr-3"></div>
                <div class="pl-3 pt-1">Western Sydney University</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <a class="nav-link" href="/home">Home</a>
                        <a class="nav-link" href="https://www.westernsydney.edu.au/">About us</a>
                        <a class="nav-link" href="/details">Details</a>
                        <a class="nav-link" href="/timetable">Timetable</a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ul>


    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/svg/wsu1.jpg" style="width: 100%; height: auto; position: center" alt="the outside of the hotel" />
            <div class="carousel-caption">
                <h3>
                    Parramatta South Campus
                </h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/svg/wsu2.jpg" style="width: 100%; height: auto; position: center" alt="the onsite restaurant" />
            <div class="carousel-caption">
                <h3>
                    Liverpool Campus
                </h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/svg/wsu3.jpg" style="width: 100%; height: auto; position: center" alt="a view from our hotel" />
            <div class="carousel-caption">
                <h3>
                    North Campus
                </h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/svg/wsu4.jpg" style="width: 100%; height: auto; position:center" alt="one of our many lovely rooms" />
            <div class="carousel-caption">
                <h3>
                    Parramatta City
                </h3>
            </div>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<br/>

<div class="row">
    <div class="col-md-8">
        <h3 style="background-color:antiquewhite; "> Welcome to Western Sydney University</h3>

        <p style="text-align:center;">
            Western Sydney University, formerly the University of Western Sydney, is an Australian multi-campus university in the Greater Western region of Sydney, Australia. The university in its current form was founded in 1989 as a federated network university with an amalgamation between the Nepean College of Advanced Education and the Hawkesbury Agricultural College.
            <br />The Macarthur Institute of Higher Education was incorporated in the university in 1989. In 2001, the University of Western Sydney was restructured as a single multi-campus university rather than as a federation. In 2015, the university underwent a rebranding which resulted in a change in name from the University of Western Sydney to Western Sydney University
            <br />It is a provider of undergraduate, postgraduate, and higher research degrees with campuses in Bankstown, Blacktown, Campbelltown, Hawkesbury, Liverpool, Parramatta, and Penrith.
            <br />In 2021, it was ranked in the top 300 in the world and 18th in Australia in the Times Higher Education World University Rankings.
        </p>
    </div>
    <div class="col-md-4">
        <h2 style="background-color:aquamarine;"> Useful Links</h2>
        <ul>
            <li><a asp-area="" asp-page="/Index">Home</a></li>
            <li><a asp-area="" asp-page="/Privacy">Privacy</a></li>
        </ul>
        <h2 style="background-color: aquamarine;"> Weather </h2>
        <ul>
            <li><a href="https://www.accuweather.com/en/au/parramatta/13180/weather-forecast/13180">Parramatta</a></li>
            <li><a href="https://www.accuweather.com/en/au/sydney/22889/weather-forecast/22889">Sydney</a></li>
        </ul>
        <h2 style="background-color: aquamarine;"> Council </h2>
        <ul>
            <li><a href="https://www.cityofparramatta.nsw.gov.au/">Parramatta City Council </a></li>
        </ul>
    </div>
</div>

</body>
</html>

