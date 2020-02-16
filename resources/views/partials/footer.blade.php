@if(session()->has('message'))
<div class="alert alert-success alert-home">
    {{ session()->get('message') }}
</div>
@endif
<footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
           <h2>Linki</h2>
            <ul class="list-group">
              <a href="{{ url('/') }}">Kontakt</a>
              {{-- <a href="{{ url('/login') }}">Logowanie</a>
              <a href="{{ url('/register') }}">Rejestracja</a> --}}
              <a href="{{ url('/') }}">Najczęściej zadawane pytania</a>
            </ul>
          </div>
          <div class="col-md-4">
            <h2>Social media</h2>
            <div class="social-media">
              <div class="d-flex justify-content-around">
                <a href="mailto:" class="google" title="google"><i class="fab fa-google"></i></a>
                <a href="" target="_blank" class="facebook" title="facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="" target="_blank" class="instagram" title="instagram"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h2>FanPage</h2>
            <div>
              <div class="fb-page" 
              data-href=""
              data-width="380" 
              data-hide-cover="false"
              data-show-facepile="false"></div>
            </div>
          </div>
        </div>
        <hr class="hr-author">
        <p class="author-footer">{{ date('Y') }} &copy; - {{ config('settings.website_name') }}. All rights reserved.</p>
      </div>
    </footer>