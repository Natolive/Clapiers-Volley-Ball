<script src="<?= base_url("src/helper/helper_datatables.js") ?>"></script>
<script src="<?= base_url("src/helper/helper_floating_action_button.js") ?>"></script>
<script src="<?= base_url("src/helper/helper_ajax.js") ?>"></script>

<script src="<?= base_url("src/js/team/add_team.js") ?>"></script>
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

<div id="template-add-team" style="display:none">
    <div id="step-1" class="row" style="display:none">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="input-name" type="text" data-length="100" maxlength="100" class="validate">
                    <label for="input-name">Nom</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
                <div class="input-field col s12 m6">
                    <input id="input-division" type="text" data-length="100" maxlength="100" class="validate">
                    <label for="input-division">Division</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
                <div class="input-field col s12">
                    <textarea id="input-description" class="materialize-textarea" data-length="200" maxlength="200" class="validate"></textarea>
                    <label for="input-description">Description</label>
                    <span style="text-align:left" class="helper-text">Optionnelle</span>
                </div>
            </div>
        </form>
    </div>
    <div id="step-2" style="display:none">
        <div id="input-image"></div>
    </div>
</div>