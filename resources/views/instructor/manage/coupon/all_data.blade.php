@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container card  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
         
  {{-- search end  --}}
  <div class="row flex-between-center mb-4">
      <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Course Price Infomations </h5>
      </div>
      <div class="col-6 col-sm-auto ms-auto text-end ps-0">
      <div id="table-purchases-replace-element" class="d-flex align-items-center">
          <!-- New Button -->
          <a href="{{route('ins_coupon.all')}}">
          <button class="btn btn-falcon-default btn-sm" type="button">
              <i class="bi bi-sliders"></i>
              <span class="d-none d-sm-inline-block ms-1">Manage All Prices</span>
          </button>
          </a>
          <!-- Export Button -->
      </div>
      </div>
  </div>
        <hr>
    <div class="row">
    @foreach ($all as $data )
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4">
      <div class="card h-100 shadow-sm border-0">
        
       
        <img src="{{asset('uploads/website/'.$data->course_image)}}" class="card-img-top" alt="Course Image" style="height: 15rem;padding:0rem 1rem;border-radius:1rem">
        
        <!-- Course Info -->

        <div class="card-body">
           
          <h5 class="card-title">{{$data->course_name}}</h5>
          <p>{{$data->course_desc}}</p>
    
        <div id="finalPriceSection-{{ $data->id }}">
          @include('instructor.manage.coupon.coupon_price_section', ['priceInfo' => $data->calculatedPrice])
        </div>
            
          
   


          {{-- coupon section --}}
         @if(!empty($data->courseCoupon))
            <div>
              <div class="my-2" style="border: 1px solid rgb(238, 238, 238);padding:10px">
             
                <h6 class="mb-1">Apply Coupon : <strong class="text-primary"> {{$data->courseCoupon->code}}</strong></h6>
               <div class="coupon-message"></div>
                <form action="{{ route('ins_coupon.apply_coupon') }}" class="applyCouponForm" data-course-id="{{ $data->courseCoupon->course_id }}" method="POST" >
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $data->courseCoupon->course_id }}">
                    <input class="form-control mb-2 couponInput" name="coupon_code" type="text" placeholder="Apply Coupon" style="font-size: 14px">
                    <button type="submit" class="btn btn-sm w-100 btn-outline-primary">Apply</button>
                </form>
               
              </div>
            </div>
          @else
            <h6 class="text-info mb-3">No Coupon Data Available </h6>
          @endif
          {{-- coupon section  --}}

          
        @if($data->courseCoupon == '')
            <a class="btn btn-sm btn-outline-primary w-100" href="{{route('ins_coupon.add',[$data->id, $data->slug])}}"> Create Coupon </a>
        @else 
          <div class="d-flex justify-content-around ">
          <a class="btn btn-sm btn-outline-primary w-50 mx-1" href="{{route('ins_coupon.edit',[$data->courseCoupon->id, $data->courseCoupon->slug])}}"> Edit Coupon </a>
          <a class="btn btn-sm btn-outline-info w-50  mx-1" href="{{route('ins_coupon.view',[$data->courseCoupon->id, $data->courseCoupon->slug])}}"> View Coupon </a>
          </div>
        @endif 
        </div>
      </div>
    </div>
    {{-- col end  --}}
    @endforeach
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
  $(document).on('submit', '.applyCouponForm', function (e) {
    e.preventDefault();

    var form = $(this);
    var courseId = form.data('course-id');
    var url = "{{ route('ins_coupon.apply_coupon') }}";
    var token = form.find('input[name="_token"]').val();
    var couponCode = form.find('.couponInput').val();

    $.ajax({
      url: url,
      type: 'POST',
      data: {
        _token: token,
        course_id: courseId,
        coupon_code: couponCode
      },
      beforeSend: function () {
        form.find('button').prop('disabled', true).text('Applying...');
      },
      success: function (response) {
        form.find('button').prop('disabled', false).text('Apply');

        // form এর ঠিক উপরের message div select করো
        var messageDiv = form.prev('.coupon-message');
        messageDiv.removeClass('alert-success alert-danger').empty();

        if (response.status) {
          $('#finalPriceSection-' + courseId).html(response.html);
          form.find('.couponInput').val('');
          messageDiv.addClass('alert alert-success').text('Coupon applied successfully!');
        } else {
          messageDiv.addClass('alert alert-danger').text(response.message);
        }

        // message auto-hide করো ৫ সেকেন্ড পরে
        setTimeout(function () {
          messageDiv.removeClass('alert alert-success alert-danger').empty();
        }, 5000);
      },
      error: function () {
        form.find('button').prop('disabled', false).text('Apply');
        alert('Something went wrong.');
      }
    });
  });
});


</script>




@endsection