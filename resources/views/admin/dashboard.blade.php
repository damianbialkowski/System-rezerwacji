@extends('layouts.admin')
@section('admin.main')
<div class="blockStatistics flex flex-direction-row justify-content-space-around align-items-center flex-wrap">
                <div class="blockStatistic allTickets">
                    <i class="fa fa-info"></i>
                    <div class="textBlock flex flex-direction-column justify-content-center">
                        <h1>{{ $item->count() }}</h1>
                        <hr>
                        <p>Wszystkie artykuły</p>
                    </div>
                </div>
                <div class="blockStatistic closedTickets">
                    <i class="fa fa-info"></i>
                    <div class="textBlock flex flex-direction-column justify-content-center">
                        <h1>{{ $item->where('created_by',\Auth::user()->id)->count() }}</h1>
                        <hr>
                        <p>Moje artykuły</p>
                    </div>
                </div>
                <div class="blockStatistic activeTickets">
                    <i class="fa fa-info"></i>
                    <div class="textBlock flex flex-direction-column justify-content-center">
                        <h1>{{ $item->where('visible',1)->count() }}</h1>
                        <hr>
                        <p>Widoczne artykuły</p>
                    </div>
                </div>
                <div class="blockStatistic takenTickets">
                    <i class="fa fa-info"></i>
                    <div class="textBlock flex flex-direction-column justify-content-center">
                        <h1>{{ $item->where('visible',0)->count() }}</h1>
                        <hr>
                        <p>Niewidoczne artykuły</p>
                    </div>
                </div>
            </div>
            <div class="listOfTickets mTop30 flex flex-direction-row justify-content-space-between flex-wrap">
                <div class="listOfActiveTickets">
                    <h1>Ostatnio dodane artykuły:</h1>
                    <table class="table">
                        <tr >
                            <th class="rowNumberTable rowIdTable">#</th>
                            <th class="rowBiggerTextTable">Informacje</th>
                            <th class="rowOtherTable">Działania</th>
                        </tr>
                        @if($item->where('created_by','!=',\Auth::user()->id)->sortBy('id')->take(5)->count())
                            @foreach($item->where('created_by','!=',\Auth::user()->id)->sortBy('id')->take(5) as $article)
                            <tr>
                                <td class="text-center">{{ $article->id }}</td>
                                <td>
                                    <p><span class="titleTable">@if($article->visible === 0) <i class="fa fa-eye-slash" aria-hidden="true"></i> | @endif {{ $article->title }}</span></p>
                                    <p><span>{{ $article->created_at }}</span> <span class="label-info-bg">{{ $article->category->name }}</span></p>
                                </td>
                                <td>
                                    <div class="flex align-items-center justify-content-center flex-wrap">
                                        <a href="{{ url('admin/article/show/'.$article->id) }}" class="btn-action-table"><i class="far fa-eye"></i></a>
                                        <a href="{{ url('admin/article/edit/'.$article->id) }}" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            
                        @endif
                    </table>
                </div>
                <div class="listOfTakenTickets">
                    <h1>Moje artykuły</h1>
                    <table class="table">
                        <tr>
                            <th class="rowNumberTable rowIdTable">#</th>
                            <th class="rowBiggerTextTable">Informacje</th>
                            <th class="rowOtherTable">Działania</th>
                        </tr>
                        @foreach($item->where('created_by',\Auth::user()->id)->sortBy('id')->take(5) as $article)
                        <tr>
                            <td class="text-center">{{ $article->id }}</td>
                            <td>
                                <p><span class="titleTable">@if($article->visible === 0) <i class="fa fa-eye-slash" aria-hidden="true"></i> | @endif {{ $article->title }}</span></p>
                                <p>{{ $article->created_at }} <span class="label-info-bg">{{ $article->category->name }}</span></p>
                            </td>
                            <td>
                                <div class="flex align-items-center justify-content-center flex-wrap">
                                    <a href="{{ route('admin.article.show', ['id' => $article->id]) }}" class="btn-action-table"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('admin.article.edit', ['id' => $article->id]) }}" class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>
@endsection

