<div class="container">
    <div class="py-2">
        <h4 class="d-inline pt-1">Daftar ceritamu</h4>
        <a href="<?= base_url('ceritaku/baru') ?>" class="btn btn-primary btn-sm d-inline float-end">Tulis Cerita</a>
    </div>
    <section class="py-2">
        <ol class="list-group">
            <?php if ($story) {?>

            <?php foreach ($story as $story) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold pt-3"><?= $story['title'] ?></div>
                    <?= strlen($story['story']) >= 70 ? substr($story['story'], 0, 70) . ' ...': $story['story']; ?>
                </div>
                <div class="text-muted">
                    02/10/21
                    <div class="text-end">
                        <form action="<?= base_url('ceritaku/edit');?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_story" value="<?= $story['id_story']?>">
                            <button class="btn badge bg-primary rounded-pill">Edit</button>
                        </form>
                    </div>
                </div>
            </li>
            <?php } ?>
            <?php } else { ?>
            <center>
                <h5>Upss.. kamu belum memiliki cerita</h5>
            </center>
            <?php } ?>
        </ol>
    </section>
</div>