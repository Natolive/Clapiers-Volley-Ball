<script src="<?= base_url("src/js/public_teams/index.js") ?>"></script>


<h3>Équipes</h3>

<div class="row">
    <?php foreach ($teams as $key => $team): ?>
        <div class="col s12 m6 l4">
            <img class="responsive-img" src="<?= base_url("serve/$team->image_uuid.$team->image_extension") ?>">
        </div>

    <?php endforeach; ?>
</div>