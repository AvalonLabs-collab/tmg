     <div class="">
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
         <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
             <h2 class="s-titleDet">INQUIRE ABOUT THIS VEHICLE</h2>
             <div class="b-detail__main-aside-about-call">
                 <span class="fa fa-phone"></span>
                 <div>1-888-378-4027</div>
                 <p>Call the seller 24/7 and they would help you.</p>
             </div>
             <div class="b-detail__main-aside-about-seller">
                 <p>Seller Info: <span>NissanCarDealer</span></p>
             </div>
             <div class="b-detail__main-aside-about-form">
                 <div class="b-detail__main-aside-about-form-links">
                     <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>GENERAL INQUIRY</a>
                     {{-- <a href="#" class="j-tab" data-to='#form2'>SCHEDULE TEST DRIVE</a> --}}
                 </div>
                 <form id="form1" action="{{ route('leads.store', $vehicle->id) }}" method="POST">
                     @csrf
                     <input type="text" placeholder="YOUR NAME" name="name" />
                     <input type="email" placeholder="EMAIL ADDRESS" value="" name="email" />
                     <input type="tel" placeholder="PHONE NO." value="" name="phone" />
                     <textarea name="inquiry" placeholder="message"></textarea>
                     <button type="submit" class="btn m-btn">SEND MESSAGE<span
                             class="fa fa-angle-right"></span></button>
                 </form>
                 {{-- <form id="form2" action="https://pro-theme.com/" method="post">
                     <input type="text" placeholder="YOUR NAME" value="" name="name" />
                     <textarea name="text" placeholder="message"></textarea>
                     <div><input type="checkbox" name="one" value="" /><label>Send me a
                             copy of this message</label></div>
                     <div><input type="checkbox" name="two" value="" /><label>Send me a
                             copy of this message</label></div>
                     <button type="submit" class="btn m-btn">SEND MESSAGE<span
                             class="fa fa-angle-right"></span></button>
                 </form> --}}
             </div>
         </div>
     </div>
