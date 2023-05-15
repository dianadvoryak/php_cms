<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <h3>Create page</h3>

            <form>
                <div class="form-group">
                    <label for="fromTitle">Title</label>
                    <input type="text" class="form-control" id="fromTitle" placeholder="Title page...">
                </div>
                <div class="form-group">
                    <label for="fromContent">Content</label>
                    <textarea class="form-control" id="fromContent"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Publish</button>
            </form>
        </div>
    </main>

<?php $this->theme->footer(); ?>