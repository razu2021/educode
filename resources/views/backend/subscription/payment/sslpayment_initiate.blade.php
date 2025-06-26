@extends('layouts.webmaster')
@section('website_contents')
<main>




<section class="payment-initiate-page py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-lg border-0 rounded-4 p-4">
          <h2 class="mb-4 text-center">Confirm Your Payment</h2>

          <div class="row g-4">
            <!-- Left: Course Info -->
            <div class="col-md-6 border-end">
              <h5 class="fw-bold mb-2">Course Details</h5>
              <p class="mb-1"><strong>Course:</strong> Laravel Masterclass</p>
              <p class="mb-1"><strong>Instructor:</strong> Henry Habib</p>
              <p class="mb-1"><strong>Price:</strong> ৳500</p>
              <p class="mb-1"><strong>Transaction ID:</strong> TXN_123456</p>
            </div>

            <!-- Right: Customer Info -->
            <div class="col-md-6">
              <h5 class="fw-bold mb-2">Customer Details</h5>
              <p class="mb-1"><strong>Name:</strong> {{ auth()->user()->name }}</p>
              <p class="mb-1"><strong>Email:</strong> {{ auth()->user()->email }}</p>
              <p class="mb-1"><strong>Phone:</strong> 01812345678</p>
              <p class="mb-1"><strong>Address:</strong> Dhaka, Bangladesh</p>
            </div>
          </div>

          <hr class="my-4">

          <!-- Confirm Button -->
          <form action="{{route('ssl_payment.create')}}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="500">
            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <input type="hidden" name="phone" value="01812345678">
            <input type="hidden" name="address" value="Dhaka, Bangladesh">

            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold fs-5">
                Proceed to Pay ৳500
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



</main>
@endsection