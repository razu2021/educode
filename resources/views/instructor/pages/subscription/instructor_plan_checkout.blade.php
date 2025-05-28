@extends('layouts.instructormaster')
@section('instructor_contents')
<style>
  .local_payment_method ul li{
    display: inline-block;
  }
</style>
<div class="row g-3">
            <div class="col-xl-4 order-xl-1">
              <div class="card">
                <div class="card-header bg-body-tertiary d-flex flex-between-center">
                  <h5 class="mb-0">Summary</h5><a class="btn btn-falcon-default btn-sm text-600" href="{{route('instructor_paln_price')}}"><span class="fas fa-pencil-alt"></span> </a>
                </div>
                <div class="card-body">
                  <table class="table table-borderless fs-10 mb-0">
                    <tbody>
                    <tr class="border-bottom">
                      <th class="ps-0">subscription plan<div class="text-400 fw-normal fs-11"></div>
                      </th>
                      <th class="pe-0 text-end">{{$data->name ?? ''}}</th>
                    </tr>
                    <tr class="border-bottom">
                      <th class="ps-0">subscription Interval <div class="text-400 fw-normal fs-11"></div>
                      </th>
                      <th class="pe-0 text-end">{{$data->interval ?? ''}}</th>
                    </tr>

                    <tr class="border-bottom">
                      <th class="ps-0">Price</th>
                      <th class="pe-0 text-end">{{$data->price ?? ''}} BDT</th>
                    </tr>
                    <tr class="border-bottom">
                      <th class="ps-0">Discount Price</th>
                      <th class="pe-0 text-end">{{$data->discount_price ?? ''}} BDT</th>
                    </tr>

                    <tr class="border-bottom">
                      <th class="ps-0">Coupon: <span class="text-success">40SITEWIDE</span></th>
                      <th class="pe-0 text-end">-$55</th>
                    </tr>
                      <th class="ps-0 pb-0">Total</th>
                      <th class="pe-0 text-end pb-0">{{$data->price}}</th>
                    </tr>
                  </tbody></table>
                </div>
                <div class="card-footer d-flex justify-content-between bg-body-tertiary">
                  <div class="fw-semi-bold">Payable Total</div>
                  <div class="fw-bold">Taka {{$data->price ?? ''}} </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8">
             
              <div class="card">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0">Payment Method</h5>
                </div>
                <div class="card-body">
                    <!-- Error & Button -->
                  <div id="card-errors" class="text-danger mt-2"></div>
                  <form>
                    {{-- check button --}}
                    <div class="row gx-0 ps-2 mb-4">
                      <div class="col-sm-8 px-3">
                        <div class="mb-3">
                          <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Card Holder Name </label>
                          <input class="form-control" id="card-holder-name" type="text" placeholder="Card Holder Name">
                        </div>
                        {{--  --}}
                        <div class="mb-3">
                          <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Card Number</label>
                          <div id="card-number-element" class="form-control p-2"></div>
                        </div>
                        {{-- end --}}
                        <div class="row align-items-center">
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Exp Date</label>
                           <div id="card-expiry-element" class="form-control p-2"></div>
                          </div>
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">CVV<a class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Card verification value" data-bs-original-title="Card verification value">
                               <span class="fa fa-question-circle ms-2"></span> </a></label>
                               <div id="card-cvc-element" class="form-control p-2"></div>
                          </div>
                        </div>
                        {{-- end --}}
                      </div>
                      <div class="col-4 ps-3 text-center pt-2 d-none d-sm-block">
                        <div class="rounded-1 p-2 mt-3 bg-100">
                          <div class="text-uppercase fs-11 fw-bold">We Accept</div><img src="{{asset('contents/backend/assets')}}/assets/img/icons/icon-payment-methods-grid.png" alt="" width="120">
                        </div>
                      </div>
                    </div>
                   
                    <div class="border-bottom border-dashed my-5"></div>
                    {{-- local payment gatway  --}}
                        <div class="local_payment_method">
                            <ul>
                              <li class="btn btn-outline-success mx-1"><a href="#"> Bkash </a></li>
                              <li class="btn btn-outline-success mx-1"><a href="#"> Nagad</a></li>
                              <li class="btn btn-outline-success mx-1"><a href="#"> Rocket</a></li>
                              <li class="btn btn-outline-success mx-1"><a href="#"> Nexsus Pay</a></li>
                            </ul>
                        </div>
                        {{-- local payment gatway  --}}
                    <div class="border-bottom border-dashed my-5"></div>

                    <div class="row">
                      <div class="col-md-7 col-xl-12 col-xxl-7 px-md-3 mb-xxl-0 position-relative">
                        <div class="d-flex"><img class="me-3">
                          <div class="flex-1">
                            <h5 class="mb-2">Buyer Protection</h5>
                            <div class="form-check mb-0"><input class="form-check-input" id="protection-option-1" type="checkbox" checked="checked"><label class="form-check-label mb-0" for="protection-option-1"> <strong>Full Refund </strong>If you don't <br class="d-none d-md-block d-lg-none">receive your order</label></div>
                            <div class="form-check"><input class="form-check-input" id="protection-option-2" type="checkbox" checked="checked"><label class="form-check-label mb-0" for="protection-option-2"> <strong>Full or Partial Refund, </strong>If the product is not as described in details</label></div><a class="fs-10 ms-3 ps-2" href="#!">Learn More <span class="fas fa-caret-right ms-1" data-fa-transform="down-2"></span></a>
                          </div>
                        </div>
                        <div class="vertical-line d-none d-md-block d-xl-none d-xxl-block"> </div>

                      </div>
                      <div class="col-md-5 col-xl-12 col-xxl-5 ps-lg-4 ps-xl-2 ps-xxl-5 text-center text-md-start text-xl-center text-xxl-start">
                        <div class="border-bottom border-dashed d-block d-md-none d-xl-block d-xxl-none my-4"></div>
                        <div class="fs-7 fw-semi-bold">All Total: <span class="text-primary">$3320</span></div>
                        <button id="card-button" class="btn btn-success mt-3 px-5" type="submit"> Confirm &amp; Pay</button>
                        <p class="fs-10 mt-3 mb-0">By clicking <strong>Confirm &amp; Pay </strong>button you agree to the <a href="#!">Terms &amp; Conditions</a></p>
                      </div>
                    </div>
                  </form>


                </div>
              </div>
            </div>
          </div>


<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}"); // Your publishable key
    const elements = stripe.elements();
    
    const cardNumber = elements.create('cardNumber');
    cardNumber.mount('#card-number-element');

    const cardExpiry = elements.create('cardExpiry');
    cardExpiry.mount('#card-expiry-element');

    const cardCvc = elements.create('cardCvc');
    cardCvc.mount('#card-cvc-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = "{{ $clientSecret }}";

    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();

        const { paymentIntent, error } = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: cardNumber,
                billing_details: {
                    name: cardHolderName.value
                }
            }
        });

        if (error) {
            alert(error.message); // Show error to your customer
        } else {
            if (paymentIntent.status === 'succeeded') {
                // ✅ Success - Now call a route to save subscription info
              window.location.href = "{{ route('payment.success') }}";
                // Optionally submit a hidden form to server
            }
        }
    });
</script>








@endsection