<div class="container">
    <div class="pt-3 pb-3">
        @partial('search')
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            @partial('filters')
        </div>
        <div class="col-md-8">
            @if(!$items->total())
                <p class="text-bold mt-4 text-center">Any Offers not found</p>
            @else
                <div class="row mt-2 mb-2">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h5>Found: <b>{{$items->total()}}</b> results</h5>
                        </div>

                        @php
                            $sortValues = [
                                'Name ASC' => request()->fullUrlWithQuery(['sort' => 'name:asc']),
                                'Name DESC' => request()->fullUrlWithQuery(['sort' => 'name:desc']),
                                'Price ASC' => request()->fullUrlWithQuery(['sort' => 'cost:asc']),
                                'Price DESC' => request()->fullUrlWithQuery(['sort' => 'cost:desc'])
                            ];
                        @endphp
                        <select class="ml-auto" id="sort-offers">
                            @foreach($sortValues as $sortKey => $sortValue)
                                <option value="{{$sortValue}}"
                                        @if(request()->fullUrl() == $sortValue) selected @endif>{{ $sortKey }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                @foreach($items as $item)
                    <div class="card offer-item__wrapper d-flex p-3">
                        <div class="row g-0">
                            @if($media = $item->getMedia('image')->first())
                                <div class="col-md-4">
                                    <img src="{{$media->getUrl()}}" alt="{{$item->name}}"
                                         class="img-fluid rounded-start">
                                </div>
                            @endif
                            <div class="col-md-8">
                                <div class="card-body offer-item__content">
                                    <a href="{{ route('Front::booking.offers.show', ['offer' => $item->slug]) }}"
                                       class="card-title">{{ $item->name }}</a>
                                    @if($hotel = $item->hotel)
                                        <span class="d-block text-gray">{{ $hotel->city->name ?? '' }}</span>
                                    @endif
                                    <p class="card-text">{!! $item->short_content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
