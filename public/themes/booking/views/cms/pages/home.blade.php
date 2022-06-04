<div class="landscape--screen">
    <div class="container">
        <div class="">
            <h1>Looking for <br><span class="fw-bold">sleep & rest?</span></h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="home-search--offers_wrapper">
        <form action="{{ route('Front::booking.offers.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-column">
                        <label for="select--city" class="mb-2 text-bold">City</label>
                        <select name="city" id="select--city">
                            @foreach($cities as $city)
                                <option value="{{ $city->slug }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group d-flex flex-column">
                        <label for="input--max_price" class="mb-2 text-bold">Max cost/1 person</label>
                        <input type="number" min="0" name="max_price" id="select--max_price" class="form-control"
                               style="border: solid 1px #e8e8e8;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="input--quantity_places" class="mb-2 text-bold">Seats</label>
                        <input type="number" min="0" name="quantity_places" id="select--quantity_places"
                               class="form-control"
                               style="border: solid 1px #e8e8e8;">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn--wrapper">
                        <button type="submit" class="btn w-100"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <div>
        <form method="GET">

        </form>
    </div>
    <section class="popular--places">
        <h2 class="text-center">Find best places</h2>
        <p class="text-center text-gray">Based on user opinions</p>

        <div class="row">
            @foreach ($cities as $city)
                <div class="col-md-3">
                    <div class="item" onclick="window.location.href='{{make_offer_url(['city' => $city->slug])}}'"
                         style="cursor: pointer">
                        @if($media = $city->getMedia('image')->first())
                            <img src="{{ $media->getUrl() }}" alt="{{ $city->name }}"
                                 style="max-width: 100%; height: auto">
                        @endif
                        <span class="d-block mt-2 text-bold">{{ $city->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="popular--places mt-4">
        <h2 class="text-center">Random top offers</h2>

        <div class="row pt-3">
            @foreach (get_random_offers(4) as $offer)
                <div class="col-md-3">
                    <div class="item">
                        @if($media = $offer->getMedia('image')->first())
                            <img src="{{ $media->getUrl() }}" alt="{{ $offer->name }}"
                                 style="max-width: 100%; height: auto">
                        @endif
                        <a href="{{ route('Front::booking.offers.show', ['offer' => $offer->slug]) }}"
                           class="d-block offer--name mt-2">{{ $offer->name }}</a>
                        <span class="d-block text-gray">{{ $offer->hotel->city->name }}</span>
                        <span class="d-block">Price from: <b>{{ $offer->cost }}</b></span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="promoted--offers mt-4">
        <h2 class="text-center">Promoted offers</h2>

        <div class="row pt-3">
            @foreach ($promotedOffers as $offer)
                <div class="col-md-3">
                    <div class="item">
                        @if($media = $offer->getMedia('image')->first())
                            <img src="{{ $media->getUrl() }}" alt="{{ $offer->name }}"
                                 style="max-width: 100%; height: auto">
                        @endif
                        <a href="{{ route('Front::booking.offers.show', ['offer' => $offer->slug]) }}"
                           class="d-block offer--name mt-2">{{ $offer->name }}</a>
                        <span class="d-block text-gray">{{ $offer->hotel->city->name }}</span>
                        <span class="d-block">Price from: <b>{{ $offer->cost }}</b></span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
