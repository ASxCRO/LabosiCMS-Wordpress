

<?php
    get_header();
?>
    <header class="masthead">
        <div class="overlay" style="background: linear-gradient(to left, rgba(0,0,1,0), rgba(0,0,255,1))"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Predmeti studija računarstvo</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="flextable">
        <?php
        
        echo "<h2>Prva godina </h2>";
        echo "<h3>Prvi semestar </h3>";

            echo daj_predmete('prvagodina','prvisemestar');
        echo "<h3>Drugi semestar </h2>";
            echo daj_predmete('prvagodina','drugisemestar');
        echo "<h2>Druga godina </h2>";
        echo "<h3>Treći semestar </h3>";
            echo daj_predmete('drugagodina','trecisemestar');
        echo "<h3>Četvrti semestar </h3>";
            echo daj_predmete('drugagodina','cetvrtisemestar');
        echo "<h2>Treca godina godina </h2>";
        echo "<h3>Peti semestar </h3>";
            echo daj_predmete('trecagodina','petisemestar');
        echo "<h3>Šesti semestar </h3>";
            echo daj_predmete('trecagodina','sestisemestar');

        ?>
    </main>
<?php
    get_footer();
?>
