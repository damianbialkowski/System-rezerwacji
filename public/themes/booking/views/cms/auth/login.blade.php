<div class="container pt-4 mb-5">
    <h1 class="pb-3 fw-bolder">Log in</h1>
    <hr class="small-hr">
    <div class="row align-items-center mt-3">
        <div class="col-md-6 col-xs-12">
            <form method="POST" action="{{ route('Front::cms.login_post') }}" class="login--wrapper">
                @csrf
                <div class="mb-3">
                    <label for="input--email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="input--email">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="input--password">
                </div>
                <button type="submit" class="mt-1 btn btn--orange d-block w-100">Log in</button>
            </form>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="auth-desc text-center">
                <p class="fw-bold fs-4">Don't have already an account?</p>
                <a href="{{ route('Front::cms.register') }}" class="btn btn--orange">Create new</a>
            </div>
        </div>
    </div>
</div>
