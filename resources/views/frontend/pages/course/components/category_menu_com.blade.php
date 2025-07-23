<section class="category-slider-section ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="owl-carousel owl-theme category_menu_sliders">
          
          <!-- Category Item -->
          @foreach ($allcategorycourse as $data)
                   
          <div class="category_menu_slider text-center">
            <a href="{{$data->url}}" class="category-link">{{$data->course_category_name ?? 'No Item Found'}}</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
