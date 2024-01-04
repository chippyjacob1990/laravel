<h2>Product Created</h2>

 <div>  Your product has been successfully created!</div>

  <div>  **Product Details:**
    <ul>
     <li>- Name: {{ $product->name }}</li>
     <li>- Price: ${{ $product->price }}</li>
     <li>- Qunatity: ${{ $product->quantity }}</li>
     $product
    </ul>
    Thank you for using our service.
   </div>

   <div> Thanks,<br>
    {{ config('app.name') }}
    <div>

