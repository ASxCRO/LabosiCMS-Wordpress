

<?php
    get_header();
    $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
    
?>
    <!-- Page Header -->
    <header class="masthead" style="background: linear-gradient(to right, rgba(0,0,1,0), rgba(0,0,255,1))">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <?php echo '<h1> Nastavnici visovke škole</h1>'; ?>
              <span class="subheading"></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
    <div class="naslovno-zvanje-container">
        <div class="naslovno-zvanje-child">
        <?php
            echo '<h2>Asistenti</h2>';
            echo daj_nastavnike('asistent');
        ?>
        </div>
        <div class="naslovno-zvanje-child">
        <?php

            echo '<h2>Viši predavači</h2>';
            echo daj_nastavnike('vp');
        ?>
        </div>
        <div class="naslovno-zvanje-child">
        <?php

            echo '<h2>Profesori Visoke škole</h2>';
            echo daj_nastavnike('pvs');
        ?>
        </div>
        <div class="naslovno-zvanje-child">
                <?php


            echo '<h2>Docenti</h2>';
                echo daj_nastavnike('docent')
                        ?>
        </div>
    
    </div>


    </main>
    <style>
        main {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .naslovno-zvanje-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
           
        }

        .naslovno-zvanje-child {
            flex-grow: 1;
            width: calc(100% * (1/2) - 10px - 1px);
        }
    </style>
<?php
    get_footer();
?>

