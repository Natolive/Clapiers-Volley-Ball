<nav>
  <div class="nav-wrapper grey darken-4">
    <div class="row">
      <div class="container s12 m12 l10">
        <a style="height: 100%; display: flex; align-items: center;" href="<?= base_url() ?>" class="brand-logo">
          <img style="height:80%;" src="<?= base_url("src/images/184940.svg") ?>" alt="">
        </a>
        <a data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?= base_url("rankings") ?>">Classements</a></li>
          <li><a href="<?= base_url("teams") ?>">Équipes</a></li>
          <li><a href="<?= base_url("events") ?>">Événements</a></li>
          <li><a href="<?= base_url("backend/dashboard") ?>">Dashboard</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<ul class="sidenav" id="mobile-navbar">
  <li><a href="<?= base_url("rankings") ?>">Classements</a></li>
  <li><a href="<?= base_url("teams") ?>">Équipes</a></li>
  <li><a href="<?= base_url("events") ?>">Événements</a></li>
  <li><a href="<?= base_url("backend/dashboard") ?>">Dashboard</a></li>
</ul>