<div class="pt-4 container">
    <div class="row">
        <div class="col-lg-9">
            <div class="row mb-5">
                <div class="offer--images col-md-7 mb-5 mb-md-0">
                    @if($mediaList = $item->getMedia('images'))
                        <div class="owl-carousel owl-theme">
                            @foreach($mediaList as $media)
                                <div class="item"><img src="{{$media->getUrl()}}"></div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="offer--desc col-md-5">
                    <h1 class="font-weight-bold">
                        {{ $item->name }}
                    </h1>
                    <span class="d-block text-gray">{{ $item->hotel->city->name ?? '' }}</span>
                    <span class="d-block">{{ $item->cost }} / {{ $item->quantity_places }}</span>
                </div>
            </div>
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="color: #000 !important;" class="nav-link active" id="desc-tab" data-bs-toggle="tab"
                            data-bs-target="#desc"
                            type="button" role="tab" aria-controls="desc" aria-selected="false">Description
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button style="color: #000 !important;" class="nav-link" id="opinions-tab" data-bs-toggle="tab"
                            data-bs-target="#opinions"
                            type="button" role="tab" aria-controls="opinions" aria-selected="false">Opinions
                        ( {{ $item->opinions()->count() }} )
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    {!! $item->short_content !!}
                    @if($item->content)
                        <hr>
                        {!! $item->content !!}
                    @endif
                </div>
                <div class="tab-pane fade" id="opinions" role="tabpanel" aria-labelledby="opinions-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <span class="text-bold">Add opinion to the service</span>
                                <form action="{{route('Front::booking.offer_rating')}}" method="POST" class="mt-4"
                                      id="offerComment">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="customer--name"
                                                       required placeholder="Name" name="customer_name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="rating" required>
                                                @for($i = 1 ; $i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea required class="form-control" id="customer--name"
                                                  placeholder="Content" style="min-height: 150px"
                                                  name="content"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="w-100 btn btn--orange btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="opinion-list d-flex">
                                @if(($opinions = $item->opinions()) && $opinions->count())
                                    @foreach($opinions->latest()->take(3)->get() as $opinion)
                                        <div class="opinion--item">
                                        <span
                                            class="text-bold">{{ $opinion->name }} ( {{ $opinion->rate }} )</span>
                                            <span class="text-gray d-block" style="font-size: 13px;">{{ $opinion->created_at->format('Y-m-d H:i') }}</span>
                                            <p>{{ str_limit($opinion->content, 100, '...') }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div>No opinion added yet</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
