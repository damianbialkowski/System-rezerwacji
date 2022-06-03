<div class="search--wrapper">
    {{ Form::open(['url' => request()->fullUrl(), 'method' => 'GET']) }}
    <div class="row">
        <div class="col-md-11">
            <input type="text" placeholder="Search" name="q" class="form-control">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn--orange">Search</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
