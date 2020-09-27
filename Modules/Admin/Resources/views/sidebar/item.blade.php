<li class="@if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($active)active @endif @if($item->hasItems())menu-item @endif">
    <a href="{{ $item->getUrl() }}" class="@if(count($appends) > 0) hasAppend @endif" @if($item->getNewTab())target="_blank"@endif>
        <i class="{{ $item->getIcon() }}"></i>
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

{{--        @if($item->hasItems())<i class="{{ $item->getToggleIcon() }} arrowRight"></i>@endif--}}
        @if($item->hasItems())<i class="fa fa-angle-right arrowRight"></i>@endif
        @if($item->hasItems())
{{--            {{dd($item)}}--}}
            @endif
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="menu-item-collapse">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
