     <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
         <div class="row m-smallPadding">
             <div class="col-xs-10">
                 <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager"
                     data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                     @if ($vehicleImages)
                         @foreach ($vehicleImages as $image)
                             <li class="s-relative">
                                 <a data-toggle="modal" data-target="#myModal" href="#"
                                     class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
                                 <img class="img-responsive center-block" src="{{ asset('storage/' . $image) }}"
                                     alt="nissan" />
                             </li>
                         @endforeach
                     @endif
                 </ul>
             </div>
             <div class="col-xs-2 pagerSlider pagerVertical">
                 <div class="b-detail__main-info-images-small" id="bx-pager">
                     @if ($vehicleImages)
                         @foreach ($vehicleImages as $item)
                             <a href="#" data-slide-index="{{ $loop->index }}"
                                 class="b-detail__main-info-images-small-one">
                                 <img class="img-responsive" src="{{ asset('storage/' . $item) }}" alt="nissan" />
                             </a>
                         @endforeach
                     @endif
                 </div>
             </div>
         </div>
     </div>
