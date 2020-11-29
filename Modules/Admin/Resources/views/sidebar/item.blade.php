<li class="@if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($active)active @endif" @click="setActiveSidebarElement($event)">
    <a href="{{ $item->getUrl() }}" class="@if(count($appends) > 0) hasAppend @endif" @if($item->getNewTab())target="_blank"@endif>
        <i class="{{ $item->getIcon() }}"></i>
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        @if($item->hasItems())<i class="fa fa-angle-right float-right mt-1 arrow-right"></i>@endif
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="sub-menu">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
