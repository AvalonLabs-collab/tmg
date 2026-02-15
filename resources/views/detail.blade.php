<x-main-app-layout>
   <x-navigation/>
    <section class="b-detail s-shadow">
        <div class="container">
            <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-sm-9 col-xs-12">
                        <div class="b-detail__head-title">
                            <h1>{{$vehicle->make}}</h1>
                            <h3>{{$vehicle->model}}</h3>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="b-detail__head-price">
                            <div class="b-detail__head-price-num">{{ $vehicle->currency }} {{ $vehicle->price }}</div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="b-detail__main">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="b-detail__main-info">
                                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
         <div class="row m-smallPadding">
             <div class="col-xs-10">
                 <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager"
                     data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                             @forelse ($vehicle->images as $image)
                             <li class="s-relative">
                                 <a data-toggle="modal" data-target="#myModal" href="#"
                                     class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
                                 <img class="img-responsive center-block" src="{{ asset('storage/'.$image) }}"
                                     alt="nissan" />
                             </li>
                    @empty
    <p>No images available.</p>
@endforelse
                 </ul>
             </div>
             <div class="col-xs-2 pagerSlider pagerVertical">
                 <div class="b-detail__main-info-images-small" id="bx-pager">
                    @forelse ( $vehicle->images as $item )
                    <a data-slide-index="{{ $loop->index }}" href="#" class="b-detail__main-info-images-small-one">
                        <img class="img-responsive center-block" src="{{ asset('storage/'.$item) }}" alt="nissan" />
                    </a>
                    @empty
                    <p>no images found</p>

                    @endforelse
                 </div>
             </div>
         </div>
     </div>

                            {{-- <div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-car"></span></div>
                                        <p>Brand New</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Status
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-trophy"></span></div>
                                        <p>5,000KM</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Warrenty
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-at"></span></div>
                                        <p>Auto</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Transmission
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-car"></span></div>
                                        <p>FWD</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Drivetrain
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-user"></span></div>
                                        <p>5</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        Passangers
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-fire-extinguisher"></span></div>
                                        <p>10.8L</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        In City
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics-one">
                                    <div class="b-detail__main-info-characteristics-one-top">
                                        <div><span class="fa fa-fire-extinguisher"></span></div>
                                        <p>7.5L</p>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one-bottom">
                                        On Highway
                                    </div>
                                </div>
                            </div> --}}
                            <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-aside-about-form-links">
                                    <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>GENERAL
                                        DESCRIPTION</a>
                                    {{-- <a href="#" class="j-tab" data-to='#info2'>SCHEDULE TEST DRIVE</a>
                                    <a href="#" class="j-tab" data-to='#info3'>GENERAL INQUIRY</a>
                                    <a href="#" class="j-tab" data-to='#info4'>SCHEDULE TEST DRIVE</a> --}}
                                </div>
                                <div id="info1">
                                    <p>
                                        {{ $vehicle->description }}
                                    </p>
                                </div>
                                {{-- <div id="info2">
                                    <p>The full review of the 2016 Nissan Maxima is coming soon. In the meantime, you
                                        can see pictures, research prices or view and
                                        compare specs for the 2016 Nissan Maxima. If you‚considering the 2014 Nissan
                                        Maxima, you can read our review.</p>
                                    <p>Vestibulum auctor lacinia nunc. Nunc ut turpis.Sed libero magna, fermentum
                                        viverra, egestas non, fermentum sed, elit. Aenean
                                        erat orci, mollis quis gravida sed, mollis a, quam. Integer fermentum neque
                                        egestas orci. Nunc posuere, felis sit amet faucibus
                                        convallis tortor enim viverra quam, hendrerit interdum dui quam ut lacus. Donec
                                        quis quam in ante condimentum blan erdit.
                                        Integer et urna. Vestibulum nisl. Ut ante est, imperdiet dignissim eleifend sit
                                        amet lacinia tempor justo. Nunc ornare atm nibh.
                                        Fusce ut felis. </p>
                                    <p>Donec ullamcorper nisi ac lectus. Proin at orci. Suspendisse nec orci nec elit
                                        convallis porttitor. Praesent sit amet turpis eu nisl
                                        faucibus pharetra. Sed eu felis. Etiam eleifend nisl nec lectus. Ut suscipit
                                        pede eu diam. Aenean vitae quam. Cras felis. Sed utdw
                                        nibh. Duis libero. Vivamus pharetra libero non facilisis imperdiet mi augue
                                        feugiat nisl.</p>
                                </div>
                                <div id="info3">
                                    <p>Vestibulum auctor lacinia nunc. Nunc ut turpis.Sed libero magna, fermentum
                                        viverra, egestas non, fermentum sed, elit. Aenean
                                        erat orci, mollis quis gravida sed, mollis a, quam. Integer fermentum neque
                                        egestas orci. Nunc posuere, felis sit amet faucibus
                                        convallis tortor enim viverra quam, hendrerit interdum dui quam ut lacus. Donec
                                        quis quam in ante condimentum blan erdit.
                                        Integer et urna. Vestibulum nisl. Ut ante est, imperdiet dignissim eleifend sit
                                        amet lacinia tempor justo. Nunc ornare atm nibh.
                                        Fusce ut felis. </p>
                                    <p>Donec ullamcorper nisi ac lectus. Proin at orci. Suspendisse nec orci nec elit
                                        convallis porttitor. Praesent sit amet turpis eu nisl
                                        faucibus pharetra. Sed eu felis. Etiam eleifend nisl nec lectus. Ut suscipit
                                        pede eu diam. Aenean vitae quam. Cras felis. Sed utdw
                                        nibh. Duis libero. Vivamus pharetra libero non facilisis imperdiet mi augue
                                        feugiat nisl.</p>
                                </div>
                                <div id="info4">
                                    <p>Donec ullamcorper nisi ac lectus. Proin at orci. Suspendisse nec orci nec elit
                                        convallis porttitor. Praesent sit amet turpis eu nisl
                                        faucibus pharetra. Sed eu felis. Etiam eleifend nisl nec lectus. Ut suscipit
                                        pede eu diam. Aenean vitae quam. Cras felis. Sed utdw
                                        nibh. Duis libero. Vivamus pharetra libero non facilisis imperdiet mi augue
                                        feugiat nisl.</p>
                                </div> --}}

                            </div>

                            @if ($vehicle->price_breakdown)
                               <div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">PRICE BREAKDOWN  </h2>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <ul class="spec-list">
                                            @foreach ( $vehicle->price_breakdown as $key => $value )
                                                <li><span class="fa fa-check"></span>{{ ucfirst($key) }}: {{ $value}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            @endif

                            @if ($vehicle->extra_specs)
                              <div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">EXTRA FEATURES</h2>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <ul class="spec-list">
                                            {{-- @foreach ( $vehicle->extra_specs as $spec )
                                                <li><span class="fa fa-check"></span>{{ $spec }}</li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                    {{-- <div class="col-xs-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span>Dual Airbag</li>
                                            <li><span class="fa fa-check"></span>Intermittent Wipers</li>
                                            <li><span class="fa fa-check"></span>Keyless Entry</li>
                                            <li><span class="fa fa-check"></span>Power Mirrors</li>
                                            <li><span class="fa fa-check"></span>Power Seat</li>
                                            <li><span class="fa fa-check"></span>Power Steering</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span>CD Player</li>
                                            <li><span class="fa fa-check"></span>Driver Side Airbag</li>
                                            <li><span class="fa fa-check"></span>Power Windows</li>
                                            <li><span class="fa fa-check"></span>Remote Start</li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>

                            @endif



                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <aside class="b-detail__main-aside">
                            <livewire:detail-specifications :$vehicle />
                            <livewire:lead-form :$vehicle />
                            {{-- <div class="b-detail__main-aside-payment wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">CAR PAYMENT CALCULATOR</h2>
                                <div class="b-detail__main-aside-payment-form">
                                    <form action="{{ route('leads.store') }}" method="post">
                                        <input type="text" placeholder="TOTAL VALUE/LOAN AMOUNT" value=""
                                            name="name" />
                                        <input type="text" placeholder="DOWN PAYMENT" value=""
                                            name="name" />
                                        <div class="s-relative">
                                            <select name="select" class="m-select">
                                                <option value="">LOAN TERM IN MONTHS</option>
                                            </select>
                                            <span class="fa fa-caret-down"></span>
                                        </div>
                                        <input type="text" placeholder="INTEREST RATE IN %" value=""
                                            name="name" />
                                        <button type="submit" class="btn m-btn">ESTIMATE PAYMENT<span
                                                class="fa fa-angle-right"></span></button>
                                    </form>
                                </div>
                                <div class="b-detail__main-aside-about-call">
                                    <span class="fa fa-calculator"></span>
                                    <div>$250 <p>PER MONTH</p>
                                    </div>
                                    <p>Total Number of Payments: <span>50</span></p>
                                </div>
                            </div> --}}
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--b-detail-->

    <section class="b-related m-home">
        <div class="container">
            <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED VEHICLES ON SALE</h2>
            <livewire:recomendation />
        </div>
    </section>
    <!--"b-related-->

    {{-- <section class="b-brands s-shadow">
        <div class="container">
            <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">BRANDS WE OFFER</h2>
            <div class="">
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/bmwLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/ferrariLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/volvo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/mercLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/audiLogo.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/honda.png" alt="brand" />
                </div>
                <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                    <img src="media/brands/peugeot.png" alt="brand" />
                </div>
            </div>
        </div>
    </section> --}}
    <!--b-brands-->
</x-main-app-layout>
