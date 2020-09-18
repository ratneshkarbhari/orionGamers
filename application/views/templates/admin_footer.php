<script src="<?php echo site_url('assets/materialize/js/materialize.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/owl-carousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/dashboard_custom.min.js'); ?>"></script>
<script>
    $(".owl-carousel").owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
</script>
</body>
</html>