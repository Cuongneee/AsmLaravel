 <!-- Start Script -->
 <script src="/client/assets/js/jquery-1.11.0.min.js"></script>
 <script src="/client/assets/js/jquery-migrate-1.2.1.min.js"></script>
 <script src="/client/assets/js/bootstrap.bundle.min.js"></script>
 <script src="/client/assets/js/templatemo.js"></script>
 <script src="/client/assets/js/custom.js"></script>
 <script src="/client/assets/js/slick.min.js"></script>
 <!-- Start Slider Script -->
 <script>
     $('#carousel-related-product').slick({
         infinite: true,
         arrows: false,
         slidesToShow: 4,
         slidesToScroll: 3,
         dots: true,
         responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 3,
                     slidesToScroll: 3
                 }
             },
             {
                 breakpoint: 600,
                 settings: {
                     slidesToShow: 2,
                     slidesToScroll: 3
                 }
             },
             {
                 breakpoint: 480,
                 settings: {
                     slidesToShow: 2,
                     slidesToScroll: 3
                 }
             }
         ]
     });
 </script>
 <!-- End Slider Script -->
 <!-- End Script -->
