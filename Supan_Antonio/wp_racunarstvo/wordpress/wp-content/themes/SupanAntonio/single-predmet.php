<?php
    get_header();
    $postContent = get_the_content();
?>
    <!-- Page Header -->
    <header class="masthead">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <?php echo '<h1>'. trim(the_title()) .'</h1>'; ?>

              <span class="subheading"> <?php   the_post_thumbnail('thumbnail');?></span>
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

        $oGodine = wp_get_post_terms( $post->ID, 'godina' );
        $oSemestri = wp_get_post_terms( $post->ID, 'semestar' );
        $sPredmet = "-";
        $sSemestar = "-";
        if(sizeof($oGodine)>0)
        {
            if(sizeof($oSemestri)>0)
                {
                    $sSemestar = $oSemestri[0]->name;
                    $sPredmet = $oGodine[0]->name;
                //     echo '
                // <div class="row">
                //     <div class="col-md-6">'.$sPredmet.'</div>
                //     <div class="col-md-6">'.$sSemestar.'</div>
                // </div>';
        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'nastavnik',
          'post_status' => 'publish'
          );
          $nastavnici = get_posts( $args );
          $sHtml = '<div class="row" style="margin: 50px">';
          $popisNastavnika = get_post_meta($post->ID, 'nastavnici_predmeta', true);
          
          foreach ($nastavnici as $nastavnik)
            {
              $sNastavnikNaziv = $nastavnik->post_title;
              $nNastavnikId = $nastavnik->ID;
              $sNastavnikUrl = $nastavnik->guid;
              $sIstaknutaSlika = get_the_post_thumbnail_url($nNastavnikId);
              $nastavniciArray = explode(', ', $popisNastavnika);
              $selected = "";
              foreach ($nastavniciArray as $oNastavnik) 
              {
                if ($oNastavnik == $sNastavnikNaziv)
                {
                  $sHtml .= '
                  <div style="margin-left: 15px">
                    <figure style ="height: 250px; width: 200px; ">
                      <a href="'.$sNastavnikUrl.'">
                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:100%">
                        <figcaption style="">'.$sNastavnikNaziv.'</figcaption>
                      </a>
                    </figure>
                  </div>
                  ';
                }
              }
            }
            if(sizeof($nastavniciArray)==1)
            {
              if ($nastavniciArray[0] == "")
              {
              $sHtml .= '<h2>Nema upisanih nastavnika!</h2>';
              }
            }
            
            $sHtml .= '</div>';

            echo $sHtml;

            echo '<main id="predmetContent">'.$postContent.'</main>';
                }
        }
	}
}
 
get_footer();
?>

 