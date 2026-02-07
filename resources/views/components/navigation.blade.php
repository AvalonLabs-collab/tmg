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
                        <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                            <ul class="navbar-nav-menu">
                                <li class="dropdown">
                                    <a  href="/">Home </a>

                                </li>
                                {{-- <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle='dropdown' href="#">Grid <span
                                            class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-nav">
                                        <li><a href="listings.html">listing 1</a></li>
                                        <li><a href="listingsTwo.html">listing 2</a></li>
                                        <li><a href="listTable.html">listing 3</a></li>
                                        <li><a href="listTableTwo.html">listing 4</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="compare.html">compare</a></li> --}}
                               <li><a href="/search">Search</a></li>
                                <li><a href="/about">About</a></li>

                                {{-- <li><a href="article.html">Services</a></li> --}}
                                {{-- <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle='dropdown' href="#">Blog <span
                                            class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-nav">
                                        <li><a href="blog.html">Blog 1</a></li>
                                        <li><a href="blogTwo.html">Blog 2</a></li>
                                        <li><a href="404.html">Page 404</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li><a href="submit1.html">Shop</a></li> --}}
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
