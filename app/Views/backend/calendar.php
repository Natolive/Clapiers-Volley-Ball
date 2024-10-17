<!-- libs -->
<script src="<?= base_url("libs/fullcalendar/index.global.min.js") ?>"></script>
<!-- helpers -->
<script src="<?= base_url("src/helper/helper_ajax.js") ?>"></script>
<script src="<?= base_url("src/helper/helper_loader.js") ?>"></script>
<!-- customs -->
<script src="<?= base_url("src/js/calendar/index.js") ?>"></script>
<script src="<?= base_url("src/js/calendar/add_game.js") ?>"></script>
<script src="<?= base_url("src/js/calendar/calendar.js") ?>"></script>
<script src="<?= base_url("src/js/calendar/request.js") ?>"></script>
<script src="<?= base_url("src/js/calendar/update_game.js") ?>"></script>

<div id="calendar"></div>


<div id="template-add-game" style="display:none">
    <div id="step-1" style="display:none">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select id="input-teams">
                        <option disabled selected>Choisissez une équipe</option>
                    </select>
                    <label>Équipes</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
                <div class="input-field col s12 m12 l12">
                    <input id="input-opposite-team" type="text" data-length="255" minlength="1" maxlength="255"
                        class="validate">
                    <label for="input-opposite-team">Nom de l'équipe adverse</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
            </div>
        </form>
    </div>
    <div id="step-2" style="display:none">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <select id="input-games-places-types">
                        <option disabled selected>Choisissez un lieu</option>
                        <?php foreach ($gamesPlacesTypes as $key => $gamePlaceType): ?>
                            <option value="<?= $gamePlaceType->id ?>"><?= $gamePlaceType->place ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Lieux</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
                <div class="input-field col s12 m12 l12">
                    <select id="input-games-championships-types">
                        <option disabled selected>Choisissez une compétition</option>
                        <?php foreach ($gamesChampionshipsTypes as $key => $gameChampionshipType): ?>
                            <option value="<?= $gameChampionshipType->id ?>"><?= $gameChampionshipType->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Compétitions</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
                <div class="input-field col s12 m12 l12">
                    <input id="input-date" type="text" class="datepicker">
                    <label>Date</label>
                    <span style="text-align:left" class="helper-text">Obligatoire</span>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="template-update-game" style="display:none">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <select id="input-teams">
                    <option disabled selected>Choisissez une équipe</option>
                </select>
                <label>Équipes</label>
                <span style="text-align:left" class="helper-text">Obligatoire</span>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="input-opposite-team" type="text" data-length="255" minlength="1" maxlength="255"
                    class="validate">
                <label for="input-opposite-team">Nom de l'équipe adverse</label>
                <span style="text-align:left" class="helper-text">Obligatoire</span>
            </div>
            <div class="input-field col s12 m12 l12">
                <select id="input-games-places-types">
                    <option disabled selected>Choisissez un lieu</option>
                    <?php foreach ($gamesPlacesTypes as $key => $gamePlaceType): ?>
                        <option value="<?= $gamePlaceType->id ?>"><?= $gamePlaceType->place ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Lieux</label>
                <span style="text-align:left" class="helper-text">Obligatoire</span>
            </div>
            <div class="input-field col s12 m12 l12">
                <select id="input-games-championships-types">
                    <option disabled selected>Choisissez une compétition</option>
                    <?php foreach ($gamesChampionshipsTypes as $key => $gameChampionshipType): ?>
                        <option value="<?= $gameChampionshipType->id ?>"><?= $gameChampionshipType->name ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Compétitions</label>
                <span style="text-align:left" class="helper-text">Obligatoire</span>
            </div>
            <div class="input-field col s12 m12 l12">
                <input id="input-date" type="text" class="datepicker">
                <label>Date</label>
                <span style="text-align:left" class="helper-text">Obligatoire</span>
            </div>
        </div>
    </form>
</div>

<style>
    #calendar {
        margin: 10px;
    }
</style>