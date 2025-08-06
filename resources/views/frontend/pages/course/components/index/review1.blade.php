{{--  testimonila start here  --}}
@if(!empty($reviews) && count($reviews) > 0)
<section class="testimonial-slider-section  section-padding section2">
  <div class="container">
    {{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'Hear From Our Successful Learners',
      'title' => "Discover how our platform has empowered thousands of learners to upgrade their skills, achieve their goals, and unlock new opportunities. These inspiring stories reflect the real impact of quality education delivered the right way.",
    'section'=>'section2'
    ])
    {{-- =========  section heading end here  --}}
    

   <div class="owl-carousel testimonial-carousel">
  @foreach ($reviews as $review)
    <div class="testimonial-card p-4 rounded-4 m-3">
      <div class="usernames">
        @php
            $avatar = $review->username?->avater;
        @endphp
        @if (!empty($avatar))
            <img src="{{ asset($avatar) }}" alt="Author">
        @else
            <img src="{{ asset('contents/frontend/assets/assetss/images/course/c2.jpg') }}" alt="Author">
        @endif
        <h4>{{ $review->username?->name ?? 'Name Loading..' }}</h4>
      </div>
      <hr>
      <h5 class="mt-2">{{ $review->title ? Str::limit($review->title, 80) : 'Review Title not found!' }}</h5>
      <p class="testimonial-text">
        {!! $review->review ? Str::limit($review->review, 80) : 'Loading...' !!}
      </p>
      <div class="rating">

        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star text-warning"></i>
      </div>
    </div>
  @endforeach
</div>

  </div>
</section>
@endif