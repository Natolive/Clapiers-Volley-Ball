<h3>Équipes</h3>

<div class="row">
    <div class="carousel carousel-slider" style="height: 60vh">
        <?php foreach ($teams as $team): ?>

            <div class="carousel-item red white-text" href="#one!">
                <img src="<?= base_url("serve/$team->image_uuid.$team->image_extension") ?>">
                <h2><?= $team->name ?></h2>
                <p class="white-text"><?= $team->division ?></p>
            </div>

            <!-- <a class="carousel-item" href="<?= $team->id ?>">
            </a> -->
            <!-- <div style="width:100%; display: flex; justify-content: center; align-items: center;">

            </div>
            <p style="margin:unset; font-size: 40px; margin-top: 5px;"><?= $team->name ?></p> -->
        <?php endforeach; ?>
    </div>
</div>

<script>
    var instance = M.Carousel.init(document.querySelectorAll('.carousel'), {
        fullWidth: true,
        indicators: true
    });
</script>