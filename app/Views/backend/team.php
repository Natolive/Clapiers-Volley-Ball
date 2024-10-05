<script src="<?= base_url("src/helper/helper_datatables.js") ?>"></script>
<script src="<?= base_url("src/helper/helper_floating_action_button.js") ?>"></script>
<script src="<?= base_url("src/helper/helper_ajax.js") ?>"></script>

<script src="<?= base_url("src/js/team/build_card_team.js") ?>"></script>
<script src="<?= base_url("src/js/team/build_floating_action_button.js") ?>"></script>
<script src="<?= base_url("src/js/team/index.js") ?>"></script>

<div id="teams" class="row">

</div>

<div id="template-card-team" class="col s12 m6 l4" style="display: none;">
    <div class="card">
        <div class="card-image">
            <img src="<?= base_url("src/images/pexels-lucasandrade-21675898.jpg") ?>">
            <span class="card-title"></span>
            <a class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">edit</i></a>
        </div>
        <div class="card-content">
            <p></p>
        </div>
    </div>
</div>