@if(!empty($faqs) && count($faqs) > 0)
<section class="faq-section section-padding">
  <div class="container">
    {{-- =========  section heading start here  --}}
    @include('frontend/pages/course/components/index/section_heading',[
      'heading' => 'Your Questions, Answered',
      'title' => "Find quick answers to common questions about our platform, courses, instructors, and more.",
    'section'=>'section2'
    ])
{{-- =========  section heading end here  --}}
    <div class="accordion" id="faqAccordion">
      @foreach ($faqs as $faq)
        
     
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}">
            {{$faq->question ?? 'Question not Found !'}}
          </button>
        </h2>
        <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
           {!! $faq->answer ?? 'Answer not Found !' !!}
          </div>
        </div>
      </div>
    @endforeach
      
    </div>
  </div>
</section>
@endif
