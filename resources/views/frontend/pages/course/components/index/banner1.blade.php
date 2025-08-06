
<!--   banner hero section  -->
<section class="banner1">
  <div class="container banner1bg">
    <div class="owl-carousel owl-theme banner1_index_slider">
      @foreach ( $bannerdata as $data)
        
      
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 col-xl-8 col-xxl-8 ">
        <div class="banner1_content">
          <h3>{{$data->banner_title}} </h3>
          <h1> {{$data->banner_heading}}</h1>
          <p>{{$data->banner_caption}}</p>
        
        </div>
        
      </div>
      {{-- col end  --}}
      <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
        <div class="banner1_image m-4">
          <img src="{{asset($data->banner_image)}}" alt="Banner image" w-25>
        </div>
      </div>
      {{-- col end  --}}
    </div>
    @endforeach
    {{-- row end here  --}}
  
    </div>
    {{-- carousel end here  --}}
  </div>
</section>
{{-- banner end here  --}}