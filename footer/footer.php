<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->


<footer class="footer-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-6 col-sm-6 footer-sec-col">
				<div class="footer-sec-col-1">
					<div class="logo-box">
						<?php dynamic_sidebar( 'footer-logo' ); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 footer-sec-col quick_link_col">
				<div class="footer-sec-col-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 footer-sec-col">
				<div class="footer-sec-col-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 footer-sec-col">
				
				<div class="footer-col-social">
					<?php dynamic_sidebar( 'footer-5' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="copyrightbox">
		<?php dynamic_sidebar( 'footer-4' ); ?>			
	</div>
</footer>


<?php wp_footer(); ?>
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
<script>

jQuery(window).scroll(function(){
	let $ = jQuery;
    if ($(this).scrollTop() > 200) {
       $('.mobileNav').addClass('Sticky');
    } else {
       $('.mobileNav').removeClass('Sticky');
    }
	if ($(this).scrollTop() > 200) {
       $('.header-sec').addClass('Sticky');
    } else {
       $('.header-sec').removeClass('Sticky');
    }
});
</script>
<script>
	jQuery(document).ready(function(){
		jQuery('#toggle-sidebar').click(function(){
			jQuery(this).next().slideToggle();

		});
	});
	jQuery(document).on('ready', function() {
		jQuery(".regular").slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3
      });
	});
	function myFunction(m1) {
	  if (m1.matches) { // If media query matches
		  jQuery(".regular").slick({
			  dots: true,
			  infinite: false,
			  slidesToShow: 1,
			  slidesToScroll: 1
			   });
	  } else if (m2.matches){
	   jQuery(".regular").slick({
        dots: true,
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 2
      });
	  } else {
	   jQuery(".regular").slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3
      });
	  }
	}

	var m1 = window.matchMedia("(max-width:567px)")
	var m2 = window.matchMedia("(max-width:991px)")
	myFunction(m1) // Call listener function at run time
	m1.addListener(myFunction) // Attach listener function on state changes
	myFunction(m2) // Call listener function at run time
	m2.addListener(myFunction) // Attach listener function on state changes
</script>




</body>
</html>

