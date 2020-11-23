 <!-- Footer -->
 <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <?php dynamic_sidebar('footer-sidebar1'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <?php dynamic_sidebar('footer-sidebar2'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <?php dynamic_sidebar('footer-sidebar3'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <?php dynamic_sidebar('footer-sidebar4'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>    
      <p class="copyright text-muted">Copyright &copy; VSMTI <?php echo date("Y.")?></p>
    </footer>

    <?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  </body>

</html>