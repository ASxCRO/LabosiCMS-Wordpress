<?php
    get_header();
    $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
    $postContent = get_the_content();
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <?php echo '<h1>'. the_title() .'</h1>'; ?>
              <span class="subheading"></span>
            </div>
          </div>
        </div>
      </div>
    </header>


    <?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();
        $sIstaknutaSlika = "";
        $sNaslov = "test";
        $sNaslov = $post->post_title;
		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/slider.jpg';
        }
        
        echo '<div class="row">
                <div class="col-md-2" style="text-align:center;"><img class="" src="'.$sIstaknutaSlika.'" alt=""></div>
                <div class="col-md-10">'.$postContent.'</div>
              </div>
        ';
	}
}

get_footer();
?>