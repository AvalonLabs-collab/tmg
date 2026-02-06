     <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
         <h2 class="s-titleDet">Description</h2>
         {{-- // make --}}
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Make</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">{{ $vehicle->make }}</p>
             </div>
         </div>
         {{-- // model --}}
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Model</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">{{ $vehicle->model }}</p>
             </div>
         </div>
         @if ($vehicle->other_specs)
             @foreach ($vehicle->other_specs as $key => $value)
                 <div class="row">
                     <div class="col-xs-6">
                         <h4 class="b-detail__main-aside-desc-title">{{ $key }}</h4>
                     </div>
                     <div class="col-xs-6">
                         <p class="b-detail__main-aside-desc-value">{{ $value }}</p>
                     </div>
                 </div>
             @endforeach
         @endif






         {{-- <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Model</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Maxima</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Kilometres</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">39,000 km</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Body Type</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Sedan</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Style/trim</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">SV Premium</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Engine</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">V-6 cyl</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Drivetrain</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">EWD</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Transmission</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Dual-Clutch Automatic</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Exterior Color</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Dark Grey</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Interior color</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Jet Black</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Passangers/Doors</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">5 Passengers / 4 Doors</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Fuel Type</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">Gasoline Fue</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">City Fuel Economy </h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">10.8L/100km</p>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                 <h4 class="b-detail__main-aside-desc-title">Hwy Fuel Economy</h4>
             </div>
             <div class="col-xs-6">
                 <p class="b-detail__main-aside-desc-value">7.7L/100km</p>
             </div>
         </div> --}}
     </div>
