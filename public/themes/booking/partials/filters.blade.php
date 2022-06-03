<div class="filter--wrapper mt-4">
    <div class="p-2 bb-1">
        <h5 class="text-bold">Search filters
        </h5>
    </div>
    <div>
        @php
            $attrs = $selectedFilters = request()->get('attr', []);
        @endphp
        @foreach($filters->get() as $filter)
            <div class="filter--item">
                <span class="text-bold">{{ $filter->name }}</span>
                @if(($filterValues = $filter->values) && $filterValues->count())
                    <div class="filter--values">
                        @foreach($filterValues as $value)
                            @php
                                $valueSelected = isset($selectedFilters[$filter->id]) && in_array($value->id, $selectedFilters[$filter->id]);
                                if ($valueSelected) {
                                    $selectedFiltersTmp = $selectedFilters;
                                    $keyRemove = array_search($value->id, $selectedFilters[$filter->id]);
                                    if ($keyRemove != -1) {
                                        unset($selectedFiltersTmp[$filter->id][$keyRemove]);
                                    }
                                    if (!count($selectedFiltersTmp[$filter->id])) {
                                        unset($selectedFiltersTmp[$filter->id]);
                                    }

                                    $filterUrl = request()->fullUrlWithQuery(['attr' => $selectedFiltersTmp]);
                                } else {
                                    $attrsTmp = $attrs;
                                    $attrsTmp[$filter->id][] = $value->id;
                                    $filterUrl = request()->fullUrlWithQuery(['attr' => $attrsTmp]);
                                }
                            @endphp
                            <div class="form-group">
                                <input type="checkbox" name="attr[{{$filter->id}}][]" value="{{$value->id}}"
                                       id="input_attr_{{$filter->id}}_{{$value->id}}"
                                       onchange="window.location.href='{{ $filterUrl }}'"
                                       @if($valueSelected) checked @endif>
                                <label for="input_attr_{{$filter->id}}_{{$value->id}}">{{$value->name}}</label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
