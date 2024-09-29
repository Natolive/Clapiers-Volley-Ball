<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Clapiers Volley Ball</title>

    <!-- Materialize -->
    <link rel="stylesheet" href="<?= base_url("libs/materialize/materialize.min.css") ?>">
    <script src="<?= base_url("libs/materialize/materialize.min.js") ?>"></script>
    
</head>

<body>
    <header>
        <?= $navbar ?>
    </header>
    <main>
        <?= $body ?>
    </main>
    <footer>

    </footer>
</body>
</html>

<style>
    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }

      nav .nav-wrapper .brand-logo {
        margin-left:0px !important;
      }
    }
</style>