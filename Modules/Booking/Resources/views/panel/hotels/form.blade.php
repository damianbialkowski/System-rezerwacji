@extends('admin::layouts.default')
@section('admin::main')
    <div class="page-content__top">
        <div class="container-fluid page-content__top-content">
            <div class="page-content__top-details">
                <a href="{{ build_crud_route('index') }}" class="return-back"><i
                        class="fas fa-long-arrow-alt-left"></i> @lang('cms::form.back')</a>
                @if($item->id)
                    <h2 class="font-weight-bold">{{ $item->name }}</h2>
                @else
                    <h2>@module_lang('title.type.' . get_current_method())</h2>
                @endif
            </div>
            <div class="page-content__top-buttons d-flex">
                @if(isset($edit) && $edit == 1)
                    <button type="submit" class="btn btn--delete"
                            form="global--form">@lang('admin::main.delete')</button>
                    <button type="submit" class="btn btn--edit"
                            form="global--form">@lang('admin::main.update')</button>
                @elseif(!$item->id)
                    <button type="submit" class="btn btn--create"
                            form="global--form">@lang('admin::main.save')</button>
                @else
                    <a class="btn btn--edit" href="{{ build_crud_route('edit', $item) }}">@lang('admin::main.edit')</a>
                @endif
            </div>
        </div>
    </div>
    <div class="page-content__container">
        <div class="container-fluid">
            <div class="card card-custom">
                <div class="card-header card-tabs">
                    <div class="card-title card-columns">
                        <ul class="nav nav-pills h-100" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#general"
                                   role="tab"
                                   aria-controls="pills-general" aria-selected="true">@lang('admin::form.general')</a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" id="pills-media-tab" data-toggle="pill" href="#media"--}}
                            {{--                                   role="tab"--}}
                            {{--                                   aria-controls="pills-media" aria-selected="true">@lang('admin::form.media')</a>--}}
                            {{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" id="pills-content-tab" data-toggle="pill" href="#content"
                                   role="tab"
                                   aria-controls="pills-content" aria-selected="true">@lang('admin::form.content')</a>
                            </li>
                            @if($form->getModel())
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-rooms-tab" data-toggle="pill" href="#rooms"
                                       role="tab"
                                       aria-controls="pills-rooms" aria-selected="true">@lang('booking::form.rooms')</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @include('admin::partials.alerts.success')
                    {!! form_start($form, ['id' => 'global--form', 'files' => true]) !!}
                    <div class="container-fluid">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="general" role="tabpanel"
                                 aria-labelledby="pills-general-tab">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->name) !!}
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->active) !!}
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        {!! form_row($form->city_id) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="content" role="tabpanel"
                                 aria-labelledby="pills-content-tab">
                                <div class="row">
                                    <div class="col-12">
                                        {!! form_row($form->short_content) !!}
                                    </div>
                                    <div class="col-12">
                                        {!! form_row($form->content) !!}
                                    </div>
                                </div>
                            </div>
                            @if($form->getModel())
                                <div class="tab-pane" id="rooms" role="tabpanel"
                                     aria-labelledby="pills-rooms-tab">
                                    <div class="row">
                                        <div class="w-100 ml-auto">
                                            <a style="width: 150px;margin-bottom: 20px;" href="{{ route('admin.booking.hotels.rooms.create', ['hotel' => $item->id]) }}" class="btn btn--edit">Create room</a>
                                        </div>
                                        @if(($rooms = $form->getModel()->rooms()->get()) && $rooms->count())
                                            @foreach($rooms as $room)
                                                <div class="item-block card">
                                                    <div class="card-header">
                                                        <span class="title">#{{$room->id}}: {{ $room->name }}</span>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($room->updated_at)
                                                            <span>@lang('admin::main.updated_at') {{$room->updated_at}}</span>
                                                        @endif
                                                        @if($room->updated_by)
                                                            <span>@lang('admin::main.updated_by') {{$room->updated_by}}</span>
                                                        @endif
                                                        <div class="badges">
                                                            @if($room->active)
                                                                <span
                                                                    class="badge badge-success">@lang('admin::main.badges.active')</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger">@lang('admin::main.badges.inactive')</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="item-block-operations">
                                                        @can('show', $item)
                                                            <a href="{{ route('admin.booking.hotels.rooms.show', ['hotel' => $item, 'room' => $room]) }}" class="show"><i class="fas fa-eye"></i></a>
                                                        @endcan
                                                        @can('edit', $item)
                                                            <a href="{{ route('admin.booking.hotels.rooms.edit', ['hotel' => $item, 'room' => $room]) }}" class="edit"><i class="fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('delete', $item)
                                                            <a href="{{ route('admin.booking.hotels.rooms.destroy', ['hotel' => $item, 'room' => $room]) }}" class="remove"><i class="fas fa-trash-alt"></i></a>
                                                        @endcan
                                                    </div>

                                                </div>
                                            @endforeach
                                        @else
                                            <span>Rooms have not been added.</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        {!! form_end($form, false) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
