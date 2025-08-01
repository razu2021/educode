@if(!empty($data->course_long_des))
<section class="course-about-section course-description-section my-4">
  <div class="container">
    <h2 class="section-title">Course Description</h2>
    <div class="description-content position-relative">
      <div id="descriptionText" class="collapsed-description">
        {!! $data->course_long_des !!} 
      </div>
       <button id="toggleButton" class="btn btn-link p-0 mt-2">See More</button>
     
    </div>
  </div>
</section>
@endif




<style>
  .collapsed-description {
    max-height: 150px; /* 16rem = 160px */
    overflow: hidden;
    position: relative;
    transition: max-height 0.3s ease;
  }

  .collapsed-description.expanded {
    max-height: none;
  }

  #toggleButton {
    font-size: 1.4rem;
    color: #007bff;
    text-decoration: none;
    border: none;
    background: transparent;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const description = document.getElementById('descriptionText');
    const toggleBtn = document.getElementById('toggleButton');

    toggleBtn.addEventListener('click', function () {
      description.classList.toggle('expanded');
      toggleBtn.textContent = description.classList.contains('expanded') ? 'See Less' : 'See More';
    });
  });
</script>
