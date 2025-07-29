@extends('layouts.webmaster')
@section('website_contents')
<main>




<section class="payment-initiate-page py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10">
        <div class="payment-card shadow-lg border-0 rounded-4 p-4 p-md-5">
          <h2 class="section-title text-center mb-4">Confirm Your Payment</h2>

          <div class="row g-5">
            <!-- Left: Customer Info & Form -->
            <div class="col-md-6">
              <form action="{{ route('ssl_payment.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label fs-4">Phone Number</label>
                  <input type="text" name="phone" class="form-control fs-4" value="{{ old('phone') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label fs-4">Division</label>
                  <input type="address" name="division" class="form-control fs-4" value="{{ old('division') }}" required>
                </div>
                <div class="mb-3 ">
                  <label class="form-label fs-4">City</label>
                  <input type="address" name="city" class="form-control fs-4" value="{{ old('city') }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fs-4">Country</label>
                  <input type="address" name="country" class="form-control fs-4" value="{{ old('country') }}" required>
                </div>

                <input type="hidden" name="course_id" value="{{ $course_id }}">
                <input type="hidden" name="course_slug" value="{{ $course_slug }}">
                <input type="hidden" name="actual_price" value="{{ $lastprice }}">
                
            </div>

            <!-- Right: Course Info -->
            <div class="col-md-6 border-start ps-md-4">
              <h5 class="fw-bold mb-3 text-success">Customer Details</h5>
              <p class="fs-4"><strong>Name:</strong> {{ auth()->user()->name }}</p>
              <p class="fs-4"><strong>Email:</strong> {{ auth()->user()->email }}</p>
              <hr>
              <h5 class="fw-bold mb-3 text-success">Course Details</h5>
              <p class="fs-4"><strong>Course:</strong> {{ $course_data->course_name ?? 'Not Found!' }}</p>
              <p class="fs-4"><strong>Instructor:</strong> {{ $course_data->userName->name ?? 'Not Found!' }}</p>
              <p class="fs-4"><strong>Price:</strong> {{ $checkoutData['checkout_price'] }}</p>
            </div>
            <hr>
            <div class="mt-4 text-center">
                  <button type="submit" class="btn btn-primary px-5 py-2 fs-5">
                    Proceed to Pay: {{ $checkoutData['checkout_price'] }}
                  </button>
                </div>
              </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




</main>
@endsection