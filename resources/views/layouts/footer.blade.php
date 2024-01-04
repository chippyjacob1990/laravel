<footer>
  <div class="text-center">Today is {{ date('d/M/Y') }}</div>
  <div class="row"> 
    <div class="col-4 bg-secondary">
      <ul class="p-2 flex-row lg-9 list-unstyled">
          <li class="p-2"><a href="{{  route('home') }}">Home</a></li>
          <li class="p-2"><a href="{{  route('about') }}">About Us</a></li>
      </ul>
    </div>
    <div class="col-4 menu bg-secondary">
      <ul class="p-2 flex-row lg-9 list-unstyled">
          <li class="p-2"><a href="{{  route('about') }}">About Us</a></li>
          <li class="p-2"><a href="{{  route('contact') }}">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-4 menu bg-secondary">
      <ul class="p-2 flex-row lg-9 list-unstyled">
          <li class="p-2"><a href="{{  route('home') }}">Home</a></li>
          <li class="p-2"><a href="{{  route('contact') }}">Contact Us</a></li>
      </ul>
    </div>
  </div>
</footer>