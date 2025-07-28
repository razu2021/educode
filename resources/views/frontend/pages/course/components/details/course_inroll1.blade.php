        <div class="course-price-card sticky-card">
          <div class="tab-header d-flex justify-content-between mb-3">
            <span class="tab active">Personal</span>
          </div>

      <p class="mb-4">
        @if($data->course_type === 'Free')
            <span class="text-success fs-1">Free</span>
        @else
            <span class="fw-bold text-dark fs-1" id="finalPrice"> {{ $priceData['final_price'] }} {{ $priceData['currency'] }} </span>
            @if($priceData['is_discount_active'])
                <del class=" text-danger"> {{ $priceData['original_price'] }} {{ $priceData['currency'] }}</del>
                 @includeIf('frontend.pages.course.components.details.discount_countdown')
            @endif
        @endif
         
      </p>


          @if($data->course_type === 'Paid' && $data->coursePrice !== '')
          <div class="button-group mb-3">
            
             <a href="" class="btn btn-sm btn-warning mb-2 w-100">Add to Cart</a>
             <a href="{{route('ssl_payment_initiate')}}" class="btn btn-sm btn-outline-success w-100">Course Enrolment </a>
          </div>
          @elseif ($data->course_type === 'Free')
              <a href="" class="btn btn-sm btn-warning w-100 mb-2">Add to Cart</a>
              <a href="{{route('ssl_payment_initiate')}}" class="btn btn-sm btn-outline-success w-100">Free Enrolment </a>
          @endif
         
         @if($data->course_type === 'Paid')
          <div class="personal-plan text-center mt-5">
            <h6 class="fw-bold">If you have a Valid coupon code ?</h6>
            <p class="text-muted"> please apply it now to get a special discount!</p>
          </div>

          <div class="coupon-box mb-3" >
            <p id="couponFeedback" class="d-block mt-2"></p>
            <input type="hidden" name="course_id" id="course_id" class="form-control mb-2" value="{{$data->id}}">
            <input type="text" name="coupon_code" id="coupon_code" class="form-control mb-2" placeholder="Enter Coupon" required>
            <button class="btn btn-primary w-100" type="button" id="applyCouponBtn">Apply</button>
          </div>
          @endif
          <hr>

          <div class="personal-plan text-center mt-3">
            <h6 class="fw-bold">Need help or have questions?</h6>
            <p class="text-muted"> Please feel free to contact the instructor directly</p>
            <button class="btn btn-outline-primary w-100 fs-7">Messages</button>
          </div>
        </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       <script>
    $(document).ready(function () {
        $('#applyCouponBtn').on('click', function (e) {
            e.preventDefault();

            let coupon = $('#coupon_code').val();
            let courseId =$('#course_id').val()
            let feedback = $('#couponFeedback');

            if (coupon === '') {
                feedback.text('⚠️ Please enter a coupon code.').removeClass().addClass('text-danger');
                return;
            }

            $.ajax({
                url: '{{ route('apply.coupon') }}',
                method: 'POST',
                data: {
                  _token: '{{ csrf_token() }}',
                  coupon_code: $('#coupon_code').val(),  // ✅ এই নামটাই controller expect করে
                  course_id: $('#course_id').val()
                },
                success: function (response) {
                   console.log(response); // এটা দেখে নাও ঠিক কি structure আসছে
                      if (response.status === 'success') {
                          const discount = parseFloat(response.priceData.coupon_discount) || 0;
                          const finalPrice = parseFloat(response.priceData.final_price) || 0;
                          const currency = response.priceData.currency || 'BDT';

                          $('#finalPrice').text( finalPrice.toFixed(2)
                        + currency );
                          $('#couponDiscountAmount').text(currency + ' ' + discount.toFixed(2));
                          $('#couponDiscountRow').show();
                          feedback.text('✅ ' + response.message).removeClass().addClass('text-success');
                      } else {
                          feedback.text('❌ ' + response.message).removeClass().addClass('text-danger');
                          $('#couponDiscountRow').hide();
                      }
                },
                    error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        feedback.text('❌ ' + xhr.responseJSON.message).removeClass().addClass('text-danger');
                       
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert("Something went wrong!");
                    }
                }
                ////
              });
          });
      });
</script>