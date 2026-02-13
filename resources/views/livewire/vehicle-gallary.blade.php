     <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
         <div class="row m-smallPadding">
             <div class="col-xs-10">
                 <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager"
                     data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                             @forelse ($vehicleImages as $image)
                             <li class="s-relative">
                                 <a data-toggle="modal" data-target="#myModal" href="#"
                                     class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
                                 <img class="img-responsive center-block" src="{{ asset($image) }}"
                                     alt="nissan" />
                             </li>
                    @empty
    <p>No images available.</p>
@endforelse



                 </ul>
             </div>
             <div class="col-xs-2 pagerSlider pagerVertical">
                 <div class="b-detail__main-info-images-small" id="bx-pager">
                    @forelse ( $vehicleImages as $item )
                    <a data-slide-index="{{ $loop->index }}" href="#" class="b-detail__main-info-images-small-one">
                        <img class="img-responsive center-block" src="{{ asset($item) }}" alt="nissan" />
                    </a>
                    @empty
                    <p>no images found</p>

                    @endforelse
                     {{-- @if ($vehicleImages)
                         @foreach ()

                         @endforeach
                     @endif --}}
                 </div>
             </div>
         </div>
     </div>
