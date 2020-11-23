<?php
get_header();
$postContent = get_the_content();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <div class="wrapper">
        <!-- Page Content -->
            <div id="content">
            <?php
                if ( have_posts() ) {

                    // Load posts loop.
                    while ( have_posts() ) {
                        the_post();
                       
                        echo '<div class="card">
                                <h5 class="card-header">Obavijest</h5>
                                    <div class="card-body">
                                        '.get_the_post_thumbnail().'
                                        <a href="../' .$post->post_name.'" class="card-title">'.get_the_title().'</a>
                                        <p class="card-text">'.$post_content.'</p>
                                    </div>
                                </div>';
                    }
                } else {
                    echo '<p>Nema niti jedne objave, pokušajte kasnije!</p>';
                }
                ?>
            </div>
            <!-- Sidebar -->
            <div id="sidebar">
                <?php dynamic_sidebar('kategorije-sidebar'); ?>
            </div>
        </div>  


		
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php
get_footer();
?>
