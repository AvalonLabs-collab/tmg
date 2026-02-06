    <section class="b-search" style="display:block">
        <div class="container">
            <form action="https://pro-theme.com/html/sokolcov/auto-club/listings.html" method="POST"
                class="b-search__main" style="margin-top:20px">
                <div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
                    <h2>UNSURE WHICH VEHICLE YOU ARE LOOKING FOR? FIND IT HERE</h2>
                </div>
                <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">   
                            <div class="m-firstSelects">
                                <div class="col-xs-4">
                                    <select wire:model.live="selectedMake" name="selectMake">
                                        @foreach ($carMakes as $item)
                                            <option value="{{ $item }}"> {{ $item }} </option>
                                        @endforeach
                                        <option value="" selected hidden>Select Any Make</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <p>MISSING MANUFACTURER?</p>
                                </div>
                                <div class="col-xs-4">
                                    {{-- // important note when no item is available to loop the default it not selected the field is just blank --}}
                                    <select value="{{$selectedModel}}"  wire:model.live="selectedModel"
                                        name="selectedModel">
                                        @foreach ($carModels as $item)
                                            <option value="{{ $item }}"> {{ $item }} </option>
                                        @endforeach
                                        <option value="" selected hidden>Select your model</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <p>MISSING MODEL?</p>
                                </div>
                                <div class="col-xs-4">
                                    <select wire:model.live="selectedCondition" name="selectedCondition" wire:ignore>
                                        @foreach ($condition as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                        <option value="" selected hidden>select status</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>

                                    {{-- <p>E.G: NEW, USED, FOREIGN USED</p> --}}
                                </div>
                            </div>
                            <div class="m-secondSelects">
                                <div class="col-xs-4">
                                    <select wire:model.live="selectedMinYear" name="select4">
                                        @foreach ($minYear as $item)
                                            <option value="" selected="">{{ $item }}</option>
                                        @endforeach
                                        <option value="" selected hidden>min year</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <p>min year</p>
                                </div>
                                <div class="col-xs-4">
                                    <select wire:model.live="selectedMaxYear" name="select5">
                                        @foreach ($maxYear as $item)
                                            <option value="" selected="">{{ $item }}</option>
                                        @endforeach
                                        <option value="" selected hidden>max year</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                    <p>max year</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 text-left s-noPadding" wire:ignore>
                            <div class="b-search__main-form-range">
                                <label>PRICE RANGE</label>
                                <div class="slider" data-min-val="{{ $minPrice }}"
                                    data-max-val="{{ $maxPrice }}"></div>
                                <input type="hidden" name="min" class="j-min" wire:model.live="selectedMinPrice"
                                    value="{{ $selectedMinPrice }}" />
                                <input type="hidden" name="max" class="j-max" wire:model.live="selectedMaxPrice"
                                    value="{{ $selectedMaxPrice }}" />
                            </div>
                            {{-- <livewire:multi-range-slider /> --}}
                            <div class="b-search__main-form-submit">
                                <a href="#">Advanced search</a>
                                <button type="submit" class="btn m-btn">Search the Vehicle<span
                                        class="fa fa-angle-right"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
