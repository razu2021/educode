<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page Loader Example</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fade-out {
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.5s ease, visibility 0.5s ease;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- ✅ Loader -->
  <div id="loader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500 border-solid"></div>
  </div>

  

  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      const content = document.getElementById('main-content');

      // Hide loader with fade
      loader.classList.add('fade-out');

      // Show content after a small delay (for smoothness)
      setTimeout(() => {
        loader.style.display = 'none';
        content.classList.remove('hidden');
      }, 500);
    });
  </script>

</body>
</html>
