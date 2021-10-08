<main class="container">
    <form action="<?= base_url('ceritaku/save'); ?>" method="post">
        <div>
            <input type="text" name="title" placeholder="Tulis Judul Cerita" class="form-control">
        </div>
        <div class="py-2">

            <!-- CKEditor wysiwyg -->
            <!-- Create the editor container -->
            <?= csrf_field() ?>
            <div class="py-2">
                <textarea name="editor1" id="editor1" cols="30" rows="10"></textarea>
            </div>
            <textarea style="display: none" name="content" id="content"></textarea>
    </form>
    <button type="submit" class="btn btn-primary btn-sm" id="save">Save</button>

    </div>
</main>

<!-- CKEditor -- js -->
<script>
    let editor = function () {
        return CKEDITOR.replace('editor1');
    }

    editor();

    document.getElementById('save').addEventListener('click', function () {
        let data = CKEDITOR.instances.editor1.getData();
        // document.getElementById('output').innerHTML = data;
        document.getElementById('content').value = data;
    });
</script>