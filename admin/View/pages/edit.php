<?php $this->theme->header(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col page-title">
                <h3><?= $page['title'] ?> page</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <form id="formPage">
                    <input type="hidden" name="page_id" id="formPageId" value="<?= $page['id'] ?>" />
                    <div class="form-group">
                        <label for="formTitle"><?= $page['title'] ?></label>
                        <input type="text" name="title" class="form-control" id="formTitle" value="<?= $page['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formContent">Content</label>
                        <textarea name="content" id="redactor" class="form-control" id="formContent"><?= $page['content'] ?></textarea>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <div>
                    <p>Publish this page</p>
                    <button type="submit" class="btn btn-primary" onclick="page.update()">
                        Update this page
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->theme->footer(); ?>
