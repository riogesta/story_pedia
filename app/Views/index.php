    <main class="container">
        <div class="bg-dark text-white p-5 rounded">
            <h1>Ceritakan ceritamu</h1>
            <p class="lead">curahkan cerita keseharian mu disini, dan ceritamu bisa menjadi
                ispirasi untuk orang lain.</p>
        </div>
    </main>

    <div class="container pt-4">
        <h3 class="border-bottom pb-3">Baca cerita</h3>
    </div>

    <main class="container py-2">
        <section>
            <div class="row justify-content-start">
                <?php if ($story) { ?>
                <?php foreach ($story as $story) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($story['title'])?></h5>
                            <span
                                class="card-text"><?= strlen($story['story']) >= 70 ? substr($story['story'], 0, 70) . ' ...': $story['story']; ?></span>
                            <div class="">
                                <a href="baca/<?= $story['id_story']; ?>"
                                    class="btn btn-sm btn-primary stretched-link">read
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else { ?>
                <center>
                    <h4>tidak ada cerita :`(</h4>
                </center>
                <?php } ?>
            </div>
        </section>
    </main>