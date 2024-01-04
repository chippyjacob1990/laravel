<div class="login-form">  
@if(Session::get('message')) 
<div class="alert alert-success my-2"> {{ Session::get('message') }}</div>
@endif
  <form action="{{ route('user.login') }}" method="post">
		@csrf
    <h5 class="mb-4">Login</h5>
    @if($errors->has('error_key')) 
    <div class="alert alert-danger my-2"> {{ $errors->first('error_key') }}</div>
     @endif
    <!-- Email input $errors->first() to get the first validation error-->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="form1Example1">Email address</label>
      <input type="email" name="email" id="email" class="form-control @error('email') is_invalid @enderror"  value="{{ old('email') }}"/>
      @if($errors->has('email')) 
        <div class="text-danger"> {{ $errors->first('email') }}</div>
      @endif
    </div>

    <!-- Password input. 
    As there is only one validation rule for password, 
    error can be get using @@error directive, print $message for getting error
    The @@error('field_name') directive is used to check if there are validation errors for a specific field.
    If there are errors for the specified field, the associated error message is printed using {{ @$message }}.
    -->
    <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="form1Example2">Password</label>
      <input type="password" name="password" id="password" class="form-control @error('password') is_invalid @enderror" />
      @error('password')
        <div class="text-danger"> {{ $message }}</div>
      @enderror
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
          <label class="form-check-label" for="form1Example3"> Remember me </label>
        </div>
      </div>

      <div class="col">
        <!-- Simple link -->
        <a href="#!">Forgot password?</a>
      </div>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
  </form>
</div>