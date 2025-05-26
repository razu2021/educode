<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    <script src="https://cdn.tiny.cloud/1/n0yxcd11fer8zn6dkpo92uu6g9154287fszqymnqctfs7nfq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


    @stack('scripts')
    @includeIf('backend/admin_component/css/style')

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

    <main class="main" id="top">
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
</body>

</html>
