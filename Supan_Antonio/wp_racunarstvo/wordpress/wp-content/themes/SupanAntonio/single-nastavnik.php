
<?php
    get_header();
    $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
    $titula_prefiks = get_post_meta($post->ID, 'titula_prefiks_nastavnika', true);
    $titula_sufiks = get_post_meta($post->ID, 'titula_sufiks_nastavnika', true);
    $titulateIme = the_title($titula_prefiks. ' ',' ' . $titula_sufiks,false);
    $postContent = get_the_content();
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <?php echo '<h1>'.$titulateIme .'</h1>'; ?>
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

        if( get_the_post_thumbnail_url($post->ID) )
        {
          $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
        }

        $oNaslovnaZvanja = wp_get_post_terms( $post->ID, 'naslovno_zvanje' );
        $sNaslovnoZvanje = "-";
            if(sizeof($oNaslovnaZvanja)>0)
                {
                    $sNaslovnoZvanje = $oNaslovnaZvanja[0]->name;
                    echo '
                    <div class="row" style="text-align:center;">
                        <div class="col-md-6"><img src="'.$sIstaknutaSlika.'" alt=""></div>
                        <div class="col-md-6" style="text-align:left;" id="nastavnik_content">
                        <h3>'.$sNaslovnoZvanje.'</h3><p>
                        '.nl2br($postContent).'</p>
                        </div>
                      </div>';
                }

	}
}

get_footer();
?>