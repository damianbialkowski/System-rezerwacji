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
{{--                @if($items->count())--}}
{{--                    @partial('offers.items', ['offers' => $items, 'edit' => true])--}}
{{--                    <div class="d-flex justify-content-center mt-4">--}}
{{--                        {{ $items->links() }}--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <p class="p-2">Nie znaleziono ogłoszeń.</p>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
</div>
