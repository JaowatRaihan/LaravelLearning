@if(Session('success'))
    <div class="alert alert-success foo" role="alert"> 
      {{ Session('success') }} {{ Session::forget('success') }} 
    </div>
    @elseif(Session('error'))
      <div class="alert alert-danger foo" role="alert"> 
      {{ Session('error') }} {{ Session::forget('error') }} 
      </div>
@endif