<html>
    <head>
        <?php include('include/common_head_content.php'); ?>
        <title>Aides associatives</title>
    </head>

    <body>
        <?php include('include/menu.php'); ?>

        <header>
            <h1>Aides associatives</h1>
            <p>Cherchez-vous des biens gratuits ?</p>
            <nav class="breadcrumb">
                <ul>
                    <li><a href="/ptut">Solidaritaix</a></li>
                    <li class="current"><a href="#">Aides associatives</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section>
                <h2>Quelques adresses pour vous aider</h2>
    
                <div id="gmap">
                    <div class="chargement">Chargement en cours</div>
                </div>
                
                <div class="zone-recherche-lieux">
                    <label for="recherche-lieux">
                        <img class="icon" src="img/loupe.svg" alt="Rechercher"/>
                    </label>
                    <input autocomplete="off" type="search" id="recherche-lieux" placeholder="Recherchez"/>
                </div>

                <div id="liste-lieux">
                    <?= $listeLieux ?>
                </div>
            </section>
        </main>

        <?php include('include/footer.php'); ?>

        
        <script src="js/distance.js"></script>

        <script>
            const locations = <?php include('include/locations_to_json.php'); ?>
        </script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS3ffoUMLHWZCmmhxNEcX-exGTioJmjXI&callback=initMap"></script>
        <script src="js/map.js"></script>
        <script src="js/assos-search.js"></script>

    </body>
</html>