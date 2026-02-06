<x-main-app-layout>
     <x-navigation/>

 
    <section class="b-best">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s">The Best &amp; the Largest Auto Dealer</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s">Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p>
                        <a href="article.html" class="btn m-btn m-readMore wow zoomInUp" data-wow-delay="0.5s">view listings<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="media/about/best.jpg" />
                </div>
            </div>
        </div>
    </section>


    <!--b-best-->

@if(!empty($company->about_us['sections']))
<section class="b-what s-shadow m-home">
    <div class="container">
        <h3 class="s-titleBg">CUSTOMERS ARE IMPORTANT FOR US</h3><br />
        <h2 class="s-title">WHAT WE OFFERS</h2>

        <div class="row">
            <h1>hello there</h1>
            @foreach($company->about_us['sections'] as $section)
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item">
                        <img class="img-responsive"
                             src="{{ asset('storage/01KGCPC9T0B28GZ5DH97NJG6DV.png') }}"
                             alt="offer" />

                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">
                                {{ $section['badge'] }}
                            </span>
                        </div>

                        <h2>{{ $section['title'] }}</h2>
                        <p>{{ $section['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

    <!--b-what-->

      @if(!empty($company->about_us['why_choose_us']))
<section class="b-more">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="b-more__why">
                    <h2 class="s-title">WHY CHOOSE US</h2>

                    <p>
                        {{ $company->about_us['why_choose_us']['text'] }}
                    </p>

                    @if(!empty($company->about_us['why_choose_us']['points']['value']))
                        <ul class="s-list">
                            @foreach($company->about_us['why_choose_us']['points']['value'] as $point)
                                <li>
                                    <span class="fa fa-check"></span>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endif


 



    <!--b-more-->
</x-main-app-layout>