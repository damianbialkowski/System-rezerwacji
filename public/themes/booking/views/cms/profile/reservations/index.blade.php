<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12 mb-4">
            <div class="bg-gray products">
                <div class="search mb-4">
                    @php
                        $url = url()->current();
                        $page = request('page', '');
                        if ($page) {
                            $url .= '?page=' . $page;
                        }
                    @endphp
                </div>
                @if($items->count())
                    <h3 class="fw-bold fs-3">All reservations - {{ $items->count() }}</h3>
                    <div class="row">
                        @foreach($items->get() as $item)
                            @php $room = $item->room @endphp
                            <div class="col-12 mt-2">
                                <div
                                    class="p-4 d-flex" style="border: 1px solid #dbdbdb">
                                    <div class="d-flex w-100" style="position: relative">
                                        @if($media = $room->getMedia('images')->first())
                                            <div class="prod-img" style="max-width: 250px;width: 100%;">
                                                <img src="{{ $media->getUrl() }}" class="img-thumbnail">
                                            </div>
                                        @endif
                                        <div class="ps-3">
                                            <div class="h2 fw-bolder"
                                                 onclick="window.location.href='{{ route('Front::booking.offers.show', ['offer' => $room->slug]) }}'">{{ ucfirst($room->name) }}</div>
                                            <div class="">Total price: <span
                                                    class="text-bold">{!! $item->total_price !!}</span></div>
                                            <div class="prod-content mt-3">
                                                <small>{{ \Str::limit($room->content, 150, '[...]') }}</small>
                                            </div>
                                        </div>
                                        <div
                                            style="cursor: pointer;position: absolute;right: 0;width: 30px;height: 30px; text-align: center;background-color: red;display: flex;justify-content: center;align-items: center;color: #fff;">
                                            <a href="" style="color: #fff" title="Cancel reservation"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--                    <div class="d-flex justify-content-center mt-4">--}}
                    {{--                        {{ $items->links() }}--}}
                    {{--                    </div>--}}
                @else
                    <p class="p-2">Any reservations not found</p>
                @endif
            </div>
        </div>
    </div>
</div>
