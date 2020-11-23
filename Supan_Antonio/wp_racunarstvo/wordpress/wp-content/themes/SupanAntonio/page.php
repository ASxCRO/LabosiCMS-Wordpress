<?php
  get_header();
  ob_start();
  the_content();
  $content_output = ob_get_clean();
?>
<?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();
		$sIstaknutaSlika = "";
		if( get_the_post_thumbnail_url($post->ID) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/about-bg.jpg';
		}
	}
}
?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Preddiplomski studij računarstva</h1>
              <span class="subheading">VSMTI</span>
            </div>
          </div>
        </div>
      </div>
    </header>



    <div class="wrapper">
      <div class="container">
        <div class="row">
  
                <!-- Page Content -->
                <div id="content" class="col-md-9">
                  <?php
                    echo $content_output;
                  ?>
                </div>
  
                  <!-- Sidebar -->
                  <div id="sidebar" class="col-md-3">
                    <?php dynamic_sidebar('glavni-sidebar'); ?>
                  </div>
  
        </div>
      </div>
    </div>  




<?php
get_footer();
?>
