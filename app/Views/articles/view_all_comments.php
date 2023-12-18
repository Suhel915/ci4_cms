<?= $this->include("layout/header") ?>

<div class="container mb-3 mt-2">
    <div class="row justify-content-center">
        <h2 style="font-style: italic;">View Comments</h2>
    </div>
</div>

<div class="container mb-2 d-flex justify-content-start">
    <form method="get" action="<?= site_url('articles/view_all_comments') ?>" class="d-flex">
        <div class="form-group container m-0 me-2">
            <input type="text" class="form-control" name="search" placeholder="Search here" value="<?= $search ?>">
        </div>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
</div>

<div class="container  col-md-12 col-lg-12 col-xs-12 col-sm-12">
    <div class="container card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Articles</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Created at</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment) : ?>
                    <tr>
                        <td><?= $comment['id'] ?></td>
                        <td><?= isset($comment['article']) ? $comment['article']['title'] : 'No Article' ?></td>
                        <td><?= $comment['email'] ?></td>
                        <td><?= $comment['feedback'] ?></td>
                        <td><?= $comment['created_at'] ?></td>
                        <td>
                            <button class="btn btn-danger" onclick="confirmDelete(<?= $comment['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <nav aria-label="...">
        <ul class="pagination">
            <?= $pager->links() ?>
        </ul>
    </nav>
</div>

<script type="text/javascript">
    function confirmDelete(commentId) {
        if (confirm("Are you sure you want to delete this comment?")) {
            window.location.href = "<?= site_url('articles/delete_comment') ?>/" + commentId;
        }
    }
</script>

<?= $this->include("layout/footer") ?>
