<div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
<div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s">
    <h2 class="s-titleDet">Description</h2>

    {{-- Core fields --}}
    @if($vehicle->make)
    <div class="row">
        <div class="col-xs-6"><h4 class="b-detail__main-aside-desc-title">Make</h4></div>
        <div class="col-xs-6"><p class="b-detail__main-aside-desc-value">{{ $vehicle->make }}</p></div>
    </div>
    @endif

    @if($vehicle->model)
    <div class="row">
        <div class="col-xs-6"><h4 class="b-detail__main-aside-desc-title">Model</h4></div>
        <div class="col-xs-6"><p class="b-detail__main-aside-desc-value">{{ $vehicle->model }}</p></div>
    </div>
    @endif

    {{-- Optional specs --}}
    @if($vehicle->other_specs)
        @foreach($vehicle->other_specs as $key => $value)
            @if($value)
            <div class="row">
                <div class="col-xs-6"><h4 class="b-detail__main-aside-desc-title">{{ $key }}</h4></div>
                <div class="col-xs-6"><p class="b-detail__main-aside-desc-value">{{ $value }}</p></div>
            </div>
            @endif
        @endforeach
    @endif

    {{-- Hardcoded fields but conditional --}}
    @php
        $fields = [
            'Kilometres' => $vehicle->kilometres ?? null,
            'Body Type' => $vehicle->body_type ?? null,
            'Style/Trim' => $vehicle->style_trim ?? null,
            'Engine' => $vehicle->engine ?? null,
            'Drivetrain' => $vehicle->drivetrain ?? null,
            'Transmission' => $vehicle->transmission ?? null,
            'Exterior Color' => $vehicle->exterior_color ?? null,
            'Interior Color' => $vehicle->interior_color ?? null,
            'Passengers/Doors' => $vehicle->passengers_doors ?? null,
            'Fuel Type' => $vehicle->fuel_type ?? null,
            'City Fuel Economy' => $vehicle->city_fuel_economy ?? null,
            'Hwy Fuel Economy' => $vehicle->hwy_fuel_economy ?? null,
        ];
    @endphp

    @foreach($fields as $label => $value)
        @if($value)
        <div class="row">
            <div class="col-xs-6"><h4 class="b-detail__main-aside-desc-title">{{ $label }}</h4></div>
            <div class="col-xs-6"><p class="b-detail__main-aside-desc-value">{{ $value }}</p></div>
        </div>
        @endif
    @endforeach
</div>
