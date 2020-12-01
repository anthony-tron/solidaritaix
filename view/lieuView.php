<html>
    <head>
        <?php include('include/common_head_content.php'); ?>
        <title>Site de la gratuité</title>
    </head>

    <body>
        <?php include('include/menu.php'); ?>
        <header>
            <h1><?= $lieu['nom'] ?></h1>
            <nav class="breadcrumb">
                <ul>
                    <li><a href="/ptut">Solidaritaix</a></li>
                    <li><a href="/ptut/assos.php">Aides associatives</a></li>
                    <li class="current"><a href="#"><?= $lieu['nom'] ?></a></li>
                </ul>
            </nav>
        </header>

        <div class="action-bar">
            <div class="action-buttons">
                <button data-id-lieu="<?= $id ?>" class="action-button epingler">
                    <img src="img/bookmark.white.svg" alt="" />
                    <img class="toggle" src="img/bookmark.white.fill.svg" alt="" />
                </button>
            </div>
        </div>

        <main>

            <div class="lieu details">
                <ul class="inline-list">
                    <li>
                        <img class="logo" src="<?= $lieu['logo_url'] ?>" alt="Illustration"/>
                    </li>

                    <li>
                        <?php if (!empty($categorieList)): ?>
                            <ul>
                                <?php foreach($categorieList as $categorie): ?>
                                    <li class="categorie-item categorie-<?= $categorie['id'] ?>">
                                        <a href="categorie.php?id=<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>

                <div>
                    <h3>Adresse</h3>
                    <address><?= $adresse['nom'] ?></address>

                    <?php if ($adresse['longitude'] !== NULL and $adresse['latitude'] !== NULL): ?>
                        <address class="distance-from"
                            data-latitude=<?= $adresse['latitude'] ?>
                            data-longitude=<?= $adresse['longitude'] ?>>À ... m de ...</address>
                    <?php endif; ?>

                    <address class="map-holder">
                        <iframe class="google-map"
                                width="600"
                                height="300"
                                frameborder="0" style="border:0"
                                src="<?= getEmbedGoogleMapURL($adresse['nom']); ?>" allowfullscreen></iframe>
                    </address>
                </div>

                <div>
                    <h3>Contact</h3>
                    <div>
                        <h4>Par courrier électronique</h4>
                        <?php while($email = $emails->fetch()): ?>
                            <address><?= $email['adresse_mail']; ?></address>
                        <?php endwhile; ?>
                    </div>
                    <div>
                        <h4>Par téléphone</h4>
                        <?php while($numeroTelephone = $numerosTelephone->fetch()): ?>
                            <address><?= formaterNumeroDeTelephone($numeroTelephone['numero']); ?></address>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div>
                    <h3>Horaires</h3>

                    <?php foreach($horaires as $jour=>$requete): ?>
                        <?php if($requete->rowCount() == 0) continue; ?>
                        <div class="jour">
                            <h4><?= $jour; ?></h4>
                            <ul class="unstyled-list">
                                <?php while($horaire = $requete->fetch()): ?>
                                    <li><?= $horaire['heure_debut'] . ' - ' . $horaire['heure_fin']; ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div>
                    <h3>Sites web</h3>

                    <?php while($siteWeb = $requeteSitesWeb->fetch()):
                        $url = htmlspecialchars($siteWeb['adresse_url']) ?>

                        <a target="_blank" href="<?= $url ?>"><?= $url ?></a>
                    <?php endwhile; ?>
                </div>
            </div>

            <aside>
                <h2>Voir aussi</h2>

                <div>
                    <h3><address>A moins de 1 km de ce lieu</address></h3>

                    <?= $listeLieuxProches ?>
                </div>
            </aside>


            
            
        </main>

        <?php include('include/footer.php'); ?>

        <script src="js/distance.js"></script>
        <script src="js/favorites.js"></script>
    </body>
</html>