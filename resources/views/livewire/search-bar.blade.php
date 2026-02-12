<div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #fdfdfd;
            color: #ffffff;
        }

        .search-header {
            padding: 30px 20px;
            display: flex;
            justify-content: center;
        }

        .search-container {
            max-width: 700px;
            width: 100%;
            text-align: center;
        }

        .search-form {
            display: flex;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .search-input {
            flex: 1;
            padding: 20px 25px;
            font-size: 1.2rem;
            border: none;
            outline: none;
            color: #2b2b2b;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .search-button {
            background-color: #ffce00;
            color: #2b2b2b;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

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

        .loader-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
        }

        .b-auto__main-item-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }
    </style>

    <header class="search-header">
        <div class="search-container">
            <div class="search-form">
                <input wire:model.live.debounce.300ms="search" name="search" placeholder="Search..." class="search-input">
                {{-- <button type="submit" class="search-button"><span>Search</span></button> --}}
            </div>
        </div>
    </header>
    <div>
        <div class="">
               <x-loader :target="''"/>
            @if ($vehicles->count())
                <div wire:loading.remove class="row" style="padding:5 90px;">
                @foreach ($vehicles as $item)
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                            {{-- <img class="img-responsive center-block"
                                src="{{ asset($item['images'][0]) }}" alt="LandRover" /> --}}
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                            </div>
                            {{-- <h2><a href="/vehicle/{{ $item['id'] }}">Land Rover Range Rover</a></h2>
                            <h2><a href="/vehicle/{{ $item['id'] }}">{{ $item['make'] }} {{ $item['model'] }}</a></h2> --}}
                            <div class="b-auto__main-item-info s-lineDownLeft">
                                <span class="m-price">
                                    {{ $item['currency'] }} {{ $item['price'] }}
                                </span>
                                <span class="m-number">
                                    <span class="fa fa-tachometer"></span>35,000 KM
                                </span>
                            </div>
                            <div class="b-featured__item-links m-auto">
                                <a href="#">Used</a>
                                <a href="#">2014</a>
                                <a href="#">Manual</a>
                                <a href="#">Orange</a>
                                <a href="#">Petrol</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <div class="loader-wrapper">
                    @if (!$vehicles->count() && $search !== '')
                        <p class="tech-heading">sorry we have no vehicle matching this description</p>
                    @endif
                    @if ($search === '' && !$vehicles->count())
                        <h1 class="tech-heading">SEARCH ANY VEHICLE</h1>
                    @endif
                </div>
            @endif


        </div>
              @if ($vehicles->hasPages())
            <div style="display:flex; justify-content:center; margin-bottom:30px">
                {{ $vehicles->links() }}
            </div>
        @endif

    </div>
</div>
