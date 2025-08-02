@if(!empty($data->courseModule))
<section class=" course-about-section course-description-section">
  <div class="container">
    <h2 class="section-title">Course Module </h2>
    <div class="description-content position-relative">
      <div id="moduleText" class="collapsed-description">
        {!! $data->courseModule->description !!} 
      </div>
       <button id="toggleButton2" class="btn btn-link p-0 mt-2">See More</button>
     
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
    const description = document.getElementById('moduleText');
    const toggleBtn = document.getElementById('toggleButton2');

    toggleBtn.addEventListener('click', function () {
      description.classList.toggle('expanded');
      toggleBtn.textContent = description.classList.contains('expanded') ? 'See Less' : 'See More';
    });
  });
</script>
