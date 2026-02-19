<div  class="">
    <div class="row">
        @forelse ($reccomendation ?? [] as $item)
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                    <img class="img-responsive center-block"
                         src="{{ asset('assets/media/237x202/mersList.jpg') }}"
                         alt="{{ $item['make'] ?? 'Vehicle' }}" />

                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                    </div>

                    {{-- <h2><a href="/vehicle/{{$item['id']}}">{{ $item['make'] ?? '' }} {{ $item['model'] ?? '' }}</a></h2> --}}

                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price">
                            {{ $item['currency'] ?? '' }} {{ $item['price'] ?? '' }}
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
        @empty
            <p>No recommendations found.</p>
        @endforelse

        <x-loader :target="'createList'" />
    </div>
</div>
