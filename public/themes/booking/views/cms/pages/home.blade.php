<div class="landscape--screen">
    <div class="container">
        <div class="">
            <h1>Looking for <br><span class="fw-bold">sleep & rest?</span></h1>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <div>
        <form method="GET">

        </form>
    </div>
    <section class="popular--places">
        <h2 class="text-center">Find best places</h2>
        <p class="text-center">Based on user opinions</p>

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
</div>
