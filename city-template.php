<?php
/*
Template Name: Pokhara
*/
 get_header();
?>
<div class="site_container">
    <div class="location_page">
        <div class="container">
            <div class="location_page_wrap">
                <h1><?php the_title(); ?></h1>
                <div class="site_row">
                    <div class="col-25">
                        <div class="col_wrap">
                            <h3>Latitude</h3>
                            <p><?php the_field('latitude'); ?></p>
                        </div>
                    </div>
                    <div class="col-25">
                        <div class="col_wrap">
                            <h3>Longitude</h3>
                            <p><?php the_field('longitude'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="city_box">
                    <h2>Nearest City From <?php the_title(); ?></h2>
                    <div class="near_city">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();