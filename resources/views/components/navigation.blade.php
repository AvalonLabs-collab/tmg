 <nav class="b-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-4">
                    <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                        {{-- <h3><a href="home.html">Auto<span>Club</span></a></h3> --}}
                         <h3><a href="/"><span>{{ $company?->name ?? config('app.name') }}</span></a></h3>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-8 d-block">
                    <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="" id="nav" style="display: block !important;">
                            <ul class="">
                                <li class="">
                                    <a class=""  href="/">Home </a>
                                </li>
                               <li><a class=""  href="/search">Search</a></li>
                                <li><a class=""  href="/about">About</a></li>
                                <li><a class=""  href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
