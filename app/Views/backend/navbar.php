<nav id="navbar">
  <div class="nav-wrapper">
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <a style="margin-left:20px;" class="brand-logo"><?= $title ?></a>
  </div>
</nav>

<ul style="display: flex; flex-direction: column;" id="slide-out" class="sidenav sidenav-fixed">
  <nav>
    <div class="nav-wrapper">
      <a style="margin-left: 20px;" class="brand-logo">Administration</a>
    </div>
  </nav>
  <li><a href="<?= base_url("") ?>"><i class="material-icons">home</i> Accueil</a></li>
  <li><a href="<?= base_url("backend/dashboard") ?>"><i class="material-icons">dashboard</i> Dashboard</a></li>
  <li><a href="<?= base_url("backend/activity") ?>"><i class="material-icons">search_activity</i> Actvités</a></li>
  <li><a href="<?= base_url("backend/team") ?>"><i class="material-icons">groups</i> Équipes</a></li>
  <li><a href="<?= base_url("backend/calendar") ?>"><i class="material-icons">calendar_month</i> Calendrier</a></li>
  <li style="margin-top:auto"><a href="<?= base_url("backend/logout") ?>"><i class="material-icons">logout</i> Déconnexion</a></li>
</ul>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, []);
  });
</script>