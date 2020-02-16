@if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-home">
    <p>{{ $error }}</p>
  </div>
  @endforeach
@endif