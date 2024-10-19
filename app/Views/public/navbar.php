<nav>
  <div class="nav-wrapper grey darken-4">
    <div class="row">
      <div class="container s12 m12 l10">
        <a style="height: 100%; display: flex; align-items: center;" href="<?= base_url() ?>" class="brand-logo">
          <img style="height:80%;" src="<?= base_url("src/images/a1239a6c-2060-4498-bd16-f1c3b6d47004.svg") ?>" alt="">
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

<ul style="display: flex; flex-direction: column;" class="sidenav" id="mobile-navbar">
  <nav>
    <div class="nav-wrapper grey darken-4">
      <a class="brand-logo">Clapiers VB</a>
    </div>
  </nav>
  <li><a href="<?= base_url("rankings") ?>"><i class="material-icons">star</i> Classements</a></li>
  <li><a href="<?= base_url("teams") ?>"><i class="material-icons">groups</i> Équipes</a></li>
  <li><a href="<?= base_url("events") ?>"><i class="material-icons">emoji_events</i> Événements</a></li>
  <li style="margin-top:auto;"><a href="<?= base_url("backend/dashboard") ?>"><i class="material-icons">admin_panel_settings</i> Dashboard</a>
  </li>
</ul>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, []);
  });
</script>