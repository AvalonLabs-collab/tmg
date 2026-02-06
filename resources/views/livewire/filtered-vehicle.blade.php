<div style="margin-top: 100px">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="row m-border">
            @foreach ($vehicleData as $item)
                <div class="col-lg-4 col-md-6 col-xs-12 wow zoomInUp navigate_vehicle_closest" data-wow-delay="0.5s">
                    <div class="b-items__cell"
                        style="border-radius:8px; box-shadow:0 8px 20px rgba(0,0,0,0.08); overflow:hidden;height:400px ; padding:10px">
                        <!-- IMAGE -->
                        <div class="b-items__cars-one-img"
                            style="width:100%; height:200px; display:flex; align-items:center; justify-content:center;">
                            <img class="img-responsive"
                                style="max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain;"
                                src="{{ asset('storage/01KGCPC9T0B28GZ5DH97NJG6DV.png') }}" alt="chevrolet" />
                        </div>
                        <!-- INFO -->
                        <div class="b-items__cell-info" style="padding:10px 12px;">
                            <div class="b-items__cell-info-title" style="margin-bottom:4px;">
                                <h2 style="font-size:16px; margin:0;">
                                    <a href="/vehicle/{{$item->id}}" style="color:#111; text-decoration:none;">
                                        {{ $item->model }}
                                    </a>
                                </h2>
                            </div>
                            <p style="font-size:13px; color:#666; margin:4px 0 6px;">
                                {{ Str::words($item->description, 3) }}
                            </p>

                            <div class="row m-smallPadding" style="margin-bottom:6px;">
                                <div class="col-xs-5">
                                    @foreach (collect($item->other_specs)->take(4) as $key => $value)
                                        <span class="b-items__cars-one-info-title"
                                            style="display:block; font-size:12px; color:#777; line-height:1.2;">
                                            {{ $key }}:
                                        </span>
                                    @endforeach
                                </div>

                                <div class="col-xs-7">
                                    @foreach (collect($item->other_specs)->take(4) as $key => $value)
                                        <span class="b-items__cars-one-info-value"
                                            style="display:block; font-size:12px; color:#111; font-weight:500; line-height:1.2;">
                                            {{ $value }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <h5 class="b-items__cell-info-price"
                                style="margin:0; font-size:15px; font-weight:600; color:#0a58ca;">
                                <span style="color:#555; font-weight:400;">Price:</span>
                                {{ $item->currency }} {{ $item->price }}
                            </h5>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
