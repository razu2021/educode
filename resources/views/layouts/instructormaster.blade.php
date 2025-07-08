<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Instructor | Dashboard </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    <script src="https://cdn.tiny.cloud/1/n0yxcd11fer8zn6dkpo92uu6g9154287fszqymnqctfs7nfq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


    @stack('scripts')
    @includeIf('backend/admin_component/css/style')
<style>
.loader {
  width: 50px;
  aspect-ratio: 1;
  display: grid;
  border-radius: 50%;
  background:
    linear-gradient(0deg ,rgb(0 0 0/50%) 30%,#0000 0 70%,rgb(0 0 0/100%) 0) 50%/8% 100%,
    linear-gradient(90deg,rgb(0 0 0/25%) 30%,#0000 0 70%,rgb(0 0 0/75% ) 0) 50%/100% 8%;
  background-repeat: no-repeat;
  animation: l23 1s infinite steps(12);
}
.loader::before,
.loader::after {
   content: "";
   grid-area: 1/1;
   border-radius: 50%;
   background: inherit;
   opacity: 0.915;
   transform: rotate(30deg);
}
.loader::after {
   opacity: 0.83;
   transform: rotate(60deg);
}
    @keyframes l23 {
    100% {transform: rotate(1turn)}
    }
</style>
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
  <!-- Loader -->
  {{-- <div id="loader" class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex justify-content-center align-items-center" style="z-index: 9999;">
    <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem; border-width: 5px;">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div> --}}


    <!-- ✅ Loader -->
  {{-- <div id="loader" class="loader-overlay">
    <div class="loader-spinner"></div>
  </div> --}}
<div class="loader" id="loader"></div>

    <main class="main d-none" id="main-content"  >
        <div class="container" data-layout="container">
       
           
            <!-- navbar deafult end here  -->
                {{-- navbar 5 --}}
                @includeIf('instructor/admin_component/navbar0_dubble_top') 
                @includeIf('instructor/admin_component/navbar1_verticale')
                @includeIf('instructor/admin_component/navbar2_top')

            <div class="content">
             
                @includeIf('instructor/admin_component/navbar3_top_single_header')
                @includeIf('instructor/admin_component/navbar4_combo')
                
                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->
              
              
                    @yield('instructor_contents')
              
             
                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->
                @includeIf('instructor/admin_component/footer')
            </div>
           
        </div>
    </main>






    @includeIf('instructor/admin_component/offcanvas_customize')
    @includeIf('instructor/admin_component/js/script')


    {{-- use for ck editor --}}
    <script>
        tinymce.init({
          selector: '#description',
          plugins: 'link image lists table code preview wordcount',
          toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview code',
          height: 400
        });
      </script>


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loader = document.getElementById('loader');
    const content = document.getElementById('main-content');

    loader.classList.add('fade-out');

    setTimeout(() => {
      loader.style.display = 'none';
      content.classList.remove('d-none');
    }, 500);
  });
</script>


</body>

</html>
