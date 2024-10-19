<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administration | Clapiers Volley Ball</title>

  <!-- Materialize -->
  <link rel="stylesheet" href="<?= base_url("libs/materialize/materialize.min.css") ?>">
  <script src="<?= base_url("libs/materialize/materialize.min.js") ?>"></script>
  <!-- JQuery -->
  <script src=<?= base_url("libs/jquery/jquery.min.js") ?>></script>
  <!-- Toast -->
  <link rel="stylesheet" href="<?= base_url("libs/toast/toast.min.css") ?>">
  <script src=<?= base_url("libs/toast/toast.min.js") ?>></script>
  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Datatables -->
  <script src="<?= base_url("libs/datatables/datatables.min.js") ?>"></script>
  <link rel="stylesheet" href="<?= base_url("libs/datatables/datatables.min.css") ?>">
  <!-- Sweet Alert 2 -->
  <script src="<?= base_url("libs/sweetalert/sweetalert.min.js") ?>"></script>
  <!-- Uppy -->
  <script src="<?= base_url("libs/uppy/uppy.min.js") ?>"></script>
  <link rel="stylesheet" href="<?= base_url("libs/uppy/uppy.min.css") ?>">
  <!-- Validator -->
  <script src="<?= base_url("libs/validator/validator.min.js") ?>"></script>
  <!-- Select 2 -->
  <script src="<?= base_url("libs/select2/select2.min.js") ?>"></script>
  <link rel="stylesheet" href="<?= base_url("libs/select2/select2.min.css") ?>">
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
  /* select {
    width: 100%;
  } */

  .cropper-modal {
    opacity: 0.5 !important;
  }

  header,
  main,
  footer {
    padding-left: 300px;
  }

  @media only screen and (max-width : 992px) {

    header,
    main,
    footer {
      padding-left: 0;
    }

    nav .nav-wrapper .brand-logo {
      margin-left: 0px !important;
    }
  }
</style>

<script>
  const GlobalVariables = {
    baseUrl: <?= json_encode(base_url()) ?>
  }
</script>