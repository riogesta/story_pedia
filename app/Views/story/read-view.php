<div class="container">
    <div class="pb-2">
        <h3><?= esc($story['title']) ?></h3>
        <p class="text-muted"><?= esc($story['date'])?> | <?= esc($story['username']) ?></p>
    </div>
    <section class="">
        <?= $story['story']?>
    </section>
</div>