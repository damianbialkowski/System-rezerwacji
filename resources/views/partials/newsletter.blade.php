{{-- @if(\Auth::check())
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Newsletter</h2>
                    <hr>
                    <p>Zapisując się do Naszego newsletter'a, będziesz otrzymywać informacje o najnowszych artykułach!</p>
                </div>
                <div class="col-md-6">
                    @if(isset($user) && $user->isSubscribeNewsletter())
                        <p class="text-center">Zapisałeś/aś się już do Newsletter'a!</p>
                    @else
                    <form action="{{ url('newsletter/subscribe') }}" method="GET">
                        @csrf
                        <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Adres e-mail" @if(\Auth::check() && isset($user) && $user->email) value="{{$user->email}}"  @endif>
                            <div class="input-group-append">
                            <button type="submit" class="input-group-text">Zapisz się</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}


    @if(session()->has('success'))
        <div class="alert alert-success alert-home">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('failure'))
        <div class="alert alert-danger alert-home">
            {{ session()->get('failure') }}
        </div>
    @endif
{{-- @endif --}}