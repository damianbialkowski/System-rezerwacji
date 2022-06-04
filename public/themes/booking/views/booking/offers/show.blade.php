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
                    <div class="offer--attributes mt-3">
                        @foreach($attributeValues as $attribute)
                            <div class="offer--attribute">
                                <span class="text-bold">{{ $attribute->name }}</span>
                                <ul style="list-style: none; padding-left: 10px">
                                    @foreach($attribute->values as $value)
                                        <li class="text-gray">{{ $value->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <div class="desc--wrapper">
                    <p>{!! $item->short_content !!}</p>
                    @if($item->content)
                        <hr>
                        <p>{!! $item->content !!}</p>
                    @endif
                </div>
                <hr class="small-hr">
                <div class="opinion--wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <p class="title text-bold m-0">Opinions ( {{ $item->opinions()->count() }} )</p>
                                <small class="text-gray">Add opinion for the service</small>
                                <form action="{{route('Front::booking.offer_rating')}}" method="POST" class="mt-4"
                                      id="offerComment">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="customer--name"
                                                       required placeholder="Name" name="customer_name"
                                                       style="border: solid 1px #e8e8e8;">
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
                                                  placeholder="Content"
                                                  style="min-height: 150px; border: solid 1px #e8e8e8;"
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
                                            class="text-bold">{{ $opinion->name }} ( {{ $opinion->rate }}/5 )</span>
                                            <span class="text-gray d-block"
                                                  style="font-size: 13px;">{{ $opinion->created_at->format('Y-m-d H:i') }}</span>
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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservation</h5>
                    @if(!auth()->check())
                        <p class="card-text">You need to <a href="{{ route('Front::cms.login') }}">log in</a> to make
                            a reservation.</p>
                    @else
                        <form action="{{ route('Front::booking.reservations.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{$item->id}}">
                            <div class="form-group">
                                <label for="total-seats"><small>Total seats</small></label>
                                <input id="total-seats" name="seats" class="form-control w-100"
                                       value="{{ $item->quantity_places }}" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="cost"><small>Cost</small></label>
                                <input id="cost" name="cost" class="form-control w-100 disabled"
                                       value="{{ $item->cost }}" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="date"><small>Date</small></label>
                                <input id="datepicker-date" name="date" class="form-control w-100">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn--orange w-100 d-block">Save</button>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
