<script src="<?= base_url("src/js/public_teams/index.js") ?>"></script>


<h3>Équipes</h3>

<div class="row">
    <?php foreach ($teams as $key => $team): ?>
        <?php $image = $team->image_uuid ? "serve/$team->image_uuid.$team->image_extension" : "src/images/f1c2343b-5928-422b-bea8-50c5582be632.webp" ?>
        <div class="col s12 m6 l6 team">
            <img class="responsive-img" src="<?= base_url($image) ?>">
            <h5><?= $team->name ?></h5>
            <h6><?= $team->division ?></h6>
        </div>

    <?php endforeach; ?>
</div>

<style>
    .team {
        margin-bottom: .75rem;
    }

    .team img {
        border-radius: 15px;
    }
</style>