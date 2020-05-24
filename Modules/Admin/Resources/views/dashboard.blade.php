@extends('admin::layouts.admin')
@section('admin::main')
    <div class="blockStatistics flex flex-direction-row justify-content-space-around align-items-center flex-wrap">
        <div class="blockStatistic allTickets">
            <i class="fa fa-info"></i>
            <div class="textBlock flex flex-direction-column justify-content-center">
{{--                <h1>{{ $item->count() }}</h1>--}}
                <hr>
                <p>Wszystkie artykuły</p>
            </div>
        </div>
        <div class="blockStatistic closedTickets">
            <i class="fa fa-info"></i>
            <div class="textBlock flex flex-direction-column justify-content-center">
{{--                <h1>{{ $item->myArticles()->count() }}</h1>--}}
                <hr>
                <p>Moje artykuły</p>
            </div>
        </div>
        <div class="blockStatistic activeTickets">
            <i class="fa fa-info"></i>
            <div class="textBlock flex flex-direction-column justify-content-center">
{{--                <h1>{{ $item->where('active', 1)->count() }}</h1>--}}
                <hr>
                <p>Widoczne artykuły</p>
            </div>
        </div>
        <div class="blockStatistic takenTickets">
            <i class="fa fa-info"></i>
            <div class="textBlock flex flex-direction-column justify-content-center">
{{--                <h1>{{ $item->where('active', 0)->count() }}</h1>--}}
                <hr>
                <p>Niewidoczne artykuły</p>
            </div>
        </div>
    </div>
    <div class="listOfTickets mTop30 flex flex-direction-row justify-content-space-between flex-wrap">
        <div class="listOfActiveTickets">
            <h1>Ostatnio dodane artykuły:</h1>
            <table class="table">
                <tr>
                    <th class="rowNumberTable rowIdTable">#</th>
                    <th class="rowBiggerTextTable">Informacje</th>
                    <th class="rowOtherTable">Działania</th>
                </tr>
{{--                @if($item->where('created_by', '!=', $user->id)->take(5)->get()->count())--}}
{{--                    @foreach($item->where('created_by','!=', $user->id)->take(5)->get() as $article)--}}
{{--                        <tr>--}}
{{--                            <td class="text-center">{{ $article->id }}</td>--}}
{{--                            <td>--}}
{{--                                <p><span class="titleTable">@if($article->active == 0) <i class="fa fa-eye-slash"--}}
{{--                                                                                          aria-hidden="true"></i>--}}
{{--                                        | @endif {{ $article->title }}</span></p>--}}
{{--                                <p><span>{{ $article->created_at }}</span> <span--}}
{{--                                        class="label-info-bg">{{ $article->category->name }}</span></p>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="flex align-items-center justify-content-center flex-wrap">--}}
{{--                                    <a href="{{ route('admin.articles.show', ['id' => $article->id]) }}"--}}
{{--                                       class="btn-action-table"><i class="far fa-eye"></i></a>--}}
{{--                                    <a href="{{ route('admin.articles.edit', ['id' => $article->id]) }}"--}}
{{--                                       class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                @else--}}

{{--                @endif--}}
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
{{--                @foreach($item->where('created_by', $user->id)->take(5)->get() as $article)--}}
{{--                    <tr>--}}
{{--                        <td class="text-center">{{ $article->id }}</td>--}}
{{--                        <td>--}}
{{--                            <p><span class="titleTable">@if($article->active == 0) <i class="fa fa-eye-slash"--}}
{{--                                                                                      aria-hidden="true"></i>--}}
{{--                                    | @endif {{ $article->title }}</span></p>--}}
{{--                            <p>{{ $article->created_at }} <span--}}
{{--                                    class="label-info-bg">{{ $article->category->name }}</span></p>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <div class="flex align-items-center justify-content-center flex-wrap">--}}
{{--                                <a href="{{ route('admin.articles.show', ['article' => $article->id]) }}"--}}
{{--                                   class="btn-action-table"><i class="far fa-eye"></i></a>--}}
{{--                                <a href="{{ route('admin.articles.edit', ['article' => $article->id]) }}"--}}
{{--                                   class="btn-action-table"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
            </table>
        </div>
    </div>

@endsection

