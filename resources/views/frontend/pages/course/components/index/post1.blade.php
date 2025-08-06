@if(!empty($posts) && count($posts) > 0)
{{-- blog start here  --}}
<section class="section-padding">
  <div class="container">
    {{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'Latest Insights & Resources',
      'title' => "Explore powerful tips, in-demand skills, and success stories to boost your learning journey and career growth.",
    'section'=>'section1'
    ])
    {{-- =========  section heading end here  --}}
    <div class="row ">
        @foreach ($posts as $post)
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4 d-flex justify-content-center">
          <a href="">
              <div class="blog-card">
                <div class="card-image">
                @if ($post->image !== '')
                    <img src="{{asset($post->image)}}" alt="Blog Image">
                @else
                    <img src="{{asset('contents/frontend/assets/assetss/images/course/c2.jpg')}}" alt="Blog Image">
                @endif
                
                <span class="tag">Priyo Master</span>
                </div>
                <div class="card-content">
                <h3 class="title">{{$post->title ? Str::limit($post->title , 50) : 'Post Title not Found !'}}</h3>
                <p class="excerpt">
                    {{$post->short_des ? Str::limit($post->short_des , 70) : 'Post Description not Found !'}}
                </p>
                <div class="author">
                    @php
                        $avatar = $post->username?->avater;
                    @endphp
                    @if (!empty($avatar))
                        <img src="{{ asset($avatar) }}" alt="Author">
                    @else
                        <img src="{{ asset('contents/frontend/assets/assetss/images/course/c2.jpg') }}" alt="Author">
                    @endif
                    <div class="info">
                        <span class="name">{{$post->username?->name ?? 'Admin'}}</span>
                        <span class="date">{{$post->created_at->format('d M, Y - h:i ') }}</span>
                    </div>
                </div>
                </div>
            </div>
          </a>
        </div>
        {{-- col end  --}}
        @endforeach
    </div>
  </div>
</section>
@endif