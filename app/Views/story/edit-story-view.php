<main class="container">
    <form action="<?= base_url('ceritaku/edit'); ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $story['id_story'];?>">
        <div>
            <input type="text" name="title" placeholder="Tulis Judul Cerita" class="form-control"
                value="<?= $story['title'] ?>">
        </div>
        <div class="py-2">

            <!-- CKEditor wysiwyg -->
            <!-- Create the editor container -->
            <div class="py-2">
                <textarea name="editor1" id="editor1" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="edit" id="edit">Edit</button>
    </form>

    </div>
</main>

<!-- CKEditor -- js -->
<script>
    let editor = function () {
        return CKEDITOR.replace('editor1');
    }

    editor();

    let data = <?=json_encode($story['story']); ?> ;
    // let data = document.getElementById('temp').value;
    CKEDITOR.instances.editor1.setData(data);

    document.getElementById('edit').addEventListener('click', function () {
        let data = CKEDITOR.instances.editor1.getData();
        // document.getElementById('output').innerHTML = data;
        document.getElementById('content').value = data;
    });
</script>