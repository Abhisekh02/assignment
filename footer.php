<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Assignment
 */
?>

	<footer  class="site_footer">
		<div class="site_container">
			<p>Copyright@2022</p>
		</div>
	</footer><!-- #colophon -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript"> 
    function distance(lat1, lon1, lat2, lon2, unit) {
      var radlat1 = Math.PI * lat1/180
      var radlat2 = Math.PI * lat2/180
      var theta = lon1-lon2
      var radtheta = Math.PI * theta/180
      var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
      if (dist > 1) {
        dist = 1;
      }
      dist = Math.acos(dist)
      dist = dist * 180/Math.PI
      dist = dist * 60 * 1.1515
      if (unit=="K") { dist = dist * 1.609344 }
      if (unit=="N") { dist = dist * 0.8684 }
      return dist
    }


    <?php 
        $post_data = array();
         $args = array (
            'post_type' => 'page',
            'posts_per_page' =>10,
            'post_status'    => 'publish',
            );
        $query = new WP_Query($args);
        if($query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post(); 
                    $post_title = get_the_title();
                    $latitude = get_field('latitude');
                    $longitude = get_field('longitude');
                    $post_link = get_the_permalink();
                    $post_data[] = array(
                        'post_title' => $post_title,
                        'latitude'   => $latitude,
                        'longitude'  => $longitude,
                        'post_url'   => $post_link
                    );
                    endwhile; 
        wp_reset_postdata();
        endif; 
    ?>
    let data = <?php echo json_encode( $post_data ); ?>;
    let html = "";
    let poslat = <?php echo get_field('latitude'); ?>;
    let poslng = <?php echo get_field('longitude'); ?>;
    jQuery('.near_city').empty();
    for (let i = 0; i < data.length; i++) {
        // Sorting array according to distance
        let location = distance(poslat, poslng, data[i].latitude, data[i].longitude);
        data[i].location = location;
        data.sort(function(a, b) {
           return a.location - b.location
        });
    }

    // Showing only five near locations 
    for (let j = 1; j <= 5; j++) {
        html = `<div class="col-20"><div class="city_details"><div class="page_title"><a href="${data[j].post_url}">${data[j].post_title}</a></div><div class="near_lait">latitude : ${data[j].latitude}</div><div class="near_logt">longitude : ${data[j].longitude}</div></div></div>`;
        jQuery('.near_city').append(html);
        console.log(data[j]);
    }


    console.log(data);
</script>
<?php wp_footer(); ?>

</body>
</html>
