<section class="">
<div class="container ">
  <div class="row g-4">
    <!-- Single Course Card -->
    @foreach ($all as $data)
    <div class=" col-12  col-sm-6 col-md-4 col-lg-3 col-xl-3 ">
      <div class="course-card3">
        <img src="{{asset('uploads/website/'.$data->course_image)}}" class="card-img-top" alt="Course Image">
        <div class="card-body">
          <h5 class="course-title">{{$data->course_name ? Str::words($data->course_name,3) : 'Not Found !'}}</h5>
          <p class="creator-name">
              by {{ $data->user_id && $data->username?->name ? $data->username->name : 'Author' }}
          </p>
          <p class="course-desc">{{$data->course_des ? Str::words($data->course_des , 10 ) : 'Not Found'}}</p>
          <div class="course-rating">
            <span class="stars">⭐⭐⭐⭐☆</span>
            <span class="rating-count">(4.5)</span>
            <span class="rating-count">(2154)</span>
          </div>
          @if($data->coursePrice && $data->course_type == 'Paid')
          <div class="course-prices">
            <span class="discount-price">{{$data->coursePrice->original_price}}</span>
            <span class="original-price text-danger">{{$data->coursePrice->discounted_price ?? ''}}</span>
          </div>
          @else
            <div class="course-prices">
                <span class="discount-price">Free</span>
                <span class="original-price text-danger"></span>
            </div>
          @endif

           
                <a href="{{ route('course_details', [$data->url, $data->slug]) }}" class="btn btn-primary view-more-btn">
                    View More
                </a>
            
        </div>
      </div>
    </div>
     @endforeach
{{-- pagination  --}}
       <div>
            {{$all->links()}}
            
       </div>
       

{{-- pagination end  --}}

    <!-- Repeat for more cards -->
  </div>
</div>

</section>