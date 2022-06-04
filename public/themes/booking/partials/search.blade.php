<div class="search--wrapper">
    {{ Form::open(['url' => request()->fullUrl(), 'method' => 'GET']) }}

    <input type="text" placeholder="Search" name="q" class="form-control">
    <button type="submit" class="btn btn--orange"><i class="fa fa-search"></i></button>

    {{ Form::close() }}
</div>
