<div>


    {{-- <div class="b-features">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3 col-xs-6 col-xs-offset-6">
                    <ul class="b-features__items">
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No
                            Haggling</li>
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car
                            Dealership</li>
                        <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety
                            Check</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!--b-features-->

    <div class="b-info">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-3 col-xs-6">
                    <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                        <article class="b-info__aside-article">
                            <h3>OPENING HOURS</h3>
                            <div class="b-info__aside-article-item">
                                <h6>Sales Department</h6>
                                <p>Mon-Sat : 8:00am - 5:00pm<br />
                                    Sunday is closed</p>
                            </div>
                            <div class="b-info__aside-article-item">
                                <h6>Service Department</h6>
                                <p>Mon-Sat : 8:00am - 5:00pm<br />
                                    Sunday is closed</p>
                            </div>
                        </article>
                        <article class="b-info__aside-article">
                            <h3>About us</h3>
                            <p>Vestibulum varius od lio eget conseq
                                uat blandit, lorem auglue comm lodo
                                nisl non ultricies lectus nibh mas lsa
                                Duis scelerisque aliquet. Ante donec
                                libero pede porttitor dacu msan esct
                                venenatis quis.</p>
                        </article>
                        <a href="about.html" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
                    </aside>
                </div> --}}
                {{-- <div class="col-md-3 col-xs-6">
                    <div class="b-info__latest">
                        <h3>LATEST AUTOS</h3>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-audi"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="detail.html">MERCEDES-AMG GT S</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-audiSpyder"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="#">AUDI R8 SPYDER V-8</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                        <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-photo m-aston"></div>
                            <div class="b-info__latest-article-info">
                                <h6><a href="#">ASTON MARTIN VANTAGE</a></h6>
                                <p><span class="fa fa-tachometer"></span> 35,000 KM</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3 col-xs-6">
                    <div class="b-info__twitter">
                        <h3>from twitter</h3>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                        <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                            <div class="b-info__twitter-article-icon"><span class="fa fa-twitter"></span></div>
                            <div class="b-info__twitter-article-content">
                                <p>Duis scelerisque aliquet ante donec libero pede porttitor dacu</p>
                                <span>20 minutes ago</span>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-md-3 col-xs-6">
                    @if($company?->phone || $company?->address || $company?->social_handles )
                         <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                        <p>contact us</p>
                        @if($company?->address)
                           <div class="b-info__contacts-item">
                            <span class="fa fa-map-marker"></span>
                            <em>{{ $company?->address }}</em>
                        </div>
                        @endif

                        @if($company?->social_handles)
                            @foreach($company->social_handles as $key => $value)
                                <div class="b-info__contacts-item">
                                    <span class="fa fa-share-alt"></span>
                                    <em>{{ $key }}: <a href="{{ $value }}" target="_blank" rel="noopener noreferrer">{{ $value }}</a></em>
                                </div>
                            @endforeach
                        @endif
                                          @if($company?->phone)
                        <div class="b-info__contacts-item">
                            <span class="fa fa-phone"></span>
                            <em>Phone: {{ $company?->phone }}</em>
                        </div>
                        @endif
                         {{-- @if($companyemail)

                        <div class="b-info__contacts-item">
                            <span class="fa fa-envelope"></span>
                            <em>Email: {{$company->em}}</em>
                        </div>
                          @endif --}}
                    </address>

                    @endif


                    {{-- <address class="b-info__map">
                        <a href="contacts.html">Open Location Map</a>
                    </address> --}}
                </div>


            </div>
        </div>
    </div>
    <!--b-info-->

    <footer class="b-footer">
        <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                        <p>Designed and  Powered by AvalonLabs.</p>
                    </div>
                </div>
                {{-- <div class="col-xs-8">
                    <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                        <div class="b-footer__content-social">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-google-plus-square"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-youtube-square"></span></a>
                            <a href="#"><span class="fa fa-skype"></span></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </footer>
</div>

