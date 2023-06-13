@props(['login_form'])
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