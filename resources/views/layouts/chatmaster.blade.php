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

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main>


        @yield('chat_content')


    </main>


@includeIf('instructor/admin_component/js/script')

</body>

</html>
