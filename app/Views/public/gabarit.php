<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clapiers Volley Ball</title>

    <!-- Materialize -->
    <link rel="stylesheet" href="<?= base_url("libs/materialize/materialize.min.css") ?>">
    <script src="<?= base_url("libs/materialize/materialize.min.js") ?>"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <header>
        <?= $navbar ?>
    </header>
    <main>
        <div class="row">
            <div class="container s12 m12 l10">
                <?= $body ?>
            </div>
        </div>
    </main>
    <footer class="page-footer grey darken-4">
        <div class="footer-copyright">
            <div class="container">
                © <?= date("Y"); ?> All right reserved Clapiers Volley Ball <br>
                La pratique du volley juste pour le plaisir du sport
            </div>
        </div>
    </footer>
</body>

</html>