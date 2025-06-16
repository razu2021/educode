/**================  preloader js ====== */
window.addEventListener('load', function () {
    const preloader = document.getElementById('preloader');
    preloader.classList.add('opacity-0'); 
    setTimeout(() => {
      preloader.style.display = 'none';
    }, 5500); 
  });


