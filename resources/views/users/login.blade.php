@include('bootstrap_sections.headForOtherPage')

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            @if(session()->has('message'))
                    <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
                  @endif
              <form action="{{ url('users/login') }}" method="post">
            @csrf     
            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email">
              <label class="form-label" for="typeEmailX-2">Email</label>
              @error('email')
                    <p style="color: black;">{{ $message }}</p>
                  @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password">
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
          </form>
            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><a href="{{ url('users/register') }}">Sign up here</a></button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><a href="/">Home page</a></button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>