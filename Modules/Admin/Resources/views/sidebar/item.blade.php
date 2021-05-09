<li class="@if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($item->hasItems()) parent @endif @if($active)active @endif"
    @click="setActiveSidebarElement($event)">
    <span>
        <a href="{{ $item->getUrl() }}">
            @if($item->getIcon())
                <i class="{{ $item->getIcon() }}"></i>
            @endif
            <span>{{ $item->getName() }}</span>
            @if($item->hasItems())<i class="fa fa-angle-right float-right mt-1 arrow-right"></i>@endif
        </a>
    </span>

    @if(count($items) > 0)
        <ul class="sub-menu">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
