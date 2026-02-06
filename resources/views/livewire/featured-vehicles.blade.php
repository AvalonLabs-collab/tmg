@if ($featuredVehicles)
    <div>
        <section class="b-featured">
            <div class="container">
                <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Featured Vehicles</h2>
                <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true"
                    data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4"
                    data-items-tablet="3" data-items-tablet-small="2">
                    @foreach ($featuredVehicles as $featuredvehicle)
                        <div>
                            <div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
                                {{-- <a href="detail.html">
                            <img src="media/186x113/mers.jpg" alt="mers" />
                            <span class="m-premium">Premium</span>
                        </a> --}}
                                <div class="b-featured__item-price">
                                    {{-- $184,900 --}}
                                    {{ $featuredvehicle['currency'] }} {{ $featuredvehicle['price'] }}
                                </div>
                                <div class="clearfix"></div>
                                <h5><a href="detail.html">MERCEDES-AMG GT / GT S</a></h5>
                                <div class="b-featured__item-count"><span class="fa fa-tachometer"></span>35,000 KM
                                </div>
                                <div class="b-featured__item-links">
                                    <a href="#">Used</a>
                                    <a href="#">2014</a>
                                    <a href="#">Manual</a>
                                    <a href="#">Orange</a>
                                    <a href="#">Petrol</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
@endif
