<div class="">
    <x-loader-search/>
    <div class="row">
        @if (isset($recommendation) && $recommendation)
            @foreach ($recommendation as $item)
                <div class="col-md-3 col-xs-6">
                    <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                        {{-- <img class="img-responsive center-block" src="{{ asset('storage/' . $item['images'][0]) }}" --}}
                        alt="LandRover" />
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                        </div>
                        <h2><a href="detail.html">Land Rover Range Rover</a></h2>
                        {{-- <h2><a href="detail.html">{{ $item['make'] }} {{ $item['model'] }}</a></h2> --}}
                        <div class="b-auto__main-item-info s-lineDownLeft">
                            <span class="m-price">
                                {{-- {{ $item['currency'] }} {{ $item['price'] }} --}}
                            </span>
                            <span class="m-number">
                                <span class="fa fa-tachometer"></span>35,000 KM
                            </span>
                        </div>
                        <div class="b-featured__item-links m-auto">
                            <a href="#">Used</a>
                            <a href="#">2014</a>s
                            <a href="#">Manual</a>
                            <a href="#">Orange</a>
                            <a href="#">Petrol</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="tech-heading">SEARCH ANY ITEM</h1>
            <style>
                .tech-heading {
                    text-align: center;
                    font-size: 0.99rem;
                    font-weight: 500;
                    letter-spacing: 1px;
                    text-transform: uppercase;
                    color: #000000;
                    margin: 12px 0 18px;
                    font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
                    opacity: 0.90;
                }

                .tech-heading::after {
                    content: "";
                    display: block;
                    width: 50px;
                    height: 1px;
                    background: #000000;
                    margin: 6px auto 0;
                    opacity: 0.4;
                }
            </style>
        @endif

        <x-loader :target="'createList'" />

    </div>
</div>
