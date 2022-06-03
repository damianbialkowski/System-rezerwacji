<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12 mb-4">
            <h3 class="fw-bold fs-3">Edit user data</h3>
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            <form action="{{ route('Front::cms.profile.change') }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="input--name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="input--name" value="{{ $item->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="input--username" value="{{ $item->username }}">
                    @if($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="input--email" value="{{ $item->email }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="input--password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="input--password">
                </div>
                <div class="mb-3">
                    <label for="input--password_confirmation" class="form-label">Repeat password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="input--password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
