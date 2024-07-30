<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>
    @include('partials.navbar')
    <div class="container-fluid">
        <div class="row">
            <div id="content-container" >
                @yield('content')
            </div>
        </div>
    </div>
    @include('partials.footer')

    <!-- jQuery (necessary for Owl Carousel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
              items: 1,
              margin: 10,
              loop: false,
              nav: false,
              dots: true,
              responsive:{
                  0:{
                      items: 1
                  },
                  600:{
                      items: 1
                  },
                  1000:{
                      items: 1
                  }
              }
          });
  
          // Equal height for all cards
          function equalizeCardHeights() {
              var maxHeight = 0;
              $('.equal-card').each(function() {
                  var cardHeight = $(this).outerHeight();
                  if (cardHeight > maxHeight) {
                      maxHeight = cardHeight;
                  }
              });
              $('.equal-card').css('height', maxHeight + 'px');
          }
  
          equalizeCardHeights();
  
          $(window).on('resize', function() {
              $('.equal-card').css('height', 'auto'); // Reset heights
              equalizeCardHeights();
          });
      });
  </script>


</body>
</html>
