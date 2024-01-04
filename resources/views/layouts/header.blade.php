<style>
  footer {
    bottom: 0; 
  }
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  .container {
    flex: 1;
  }
  .login-form {
    border: 1px solid aqua;
    padding: 15px 20px;
  }
</style>

<div class="outer-container bg-primary"> 
    <div class="">
    <h1 class="lg-12 text-center">{{ config('app.name') }}</h1>
    </div>
    <div class="lg-12 row menu bg-secondary">
      <ul class="col-sm-10 d-flex p-2 flex-row flex-wrap list-unstyled">
          <li class="p-2"><a href="{{  route('home') }}">Home</a></li>
          <li class="p-2"><a href="{{  route('about') }}">About Us</a></li>
          <li class="p-2"><a href="{{  route('contact') }}">Contact Us</a></li>
          <li class="p-2"><a href="{{  route('user.create') }}">Create Users</a></li>
          @if(auth()->user())
          <li class="p-2"><a href="{{  route('posts.list') }}">Posts</a></li>
          <li class="p-2"><a href="{{  route('user.list') }}">Users</a></li>
          <li class="p-2"><a href="{{  route('user.search', ['id_or_name' => 1, 'status' => 'active']) }}">Search Users</a></li>
          @endif
          <ul class="p-2 list-unstyled">
          <li class="p-2"><a href="{{ route('sample.index') }}">Sample Product</a></li>
          <li class="p-2"><a href="{{ route('sample.view') }}">Sample Product View</a></li>
          </ul class="d-flex p-2 flex-row list-unstyled">
          <li class="p-2"><a href="{{ route('products.create') }}">Create New Products</a></li>
      </ul>
      @if(auth()->user())
      <ul class="col-sm-2 d-flex p-2 flex-column list-unstyled">
        <li class="p-2"><a href="{{  route('user.homepage') }}">My Account</a></li>
        <li class="p-2"><a href="{{  route('home') }}">Change Password</a></li>
        <li class="p-2"><a href="{{  route('user.logout') }}">Logout</a></li>
      </ul>
      @endif
    </div>
</div>