@if($filter_list = $data['filter_list'])
    @foreach($filter_list['data'] as $type => $filter)
        <a href="{{ $filter_list['urls'][$type] }}" class="item-filter items-{{$type}}">
            @lang('admin::filter_list.type.'.$type) <span
                class="badge badge-pill @if(isset($filter['badge']))badge-{{$filter['badge']}}@endif float-right">{{$filter['count']}}</span>
        </a>
    @endforeach
@endif
