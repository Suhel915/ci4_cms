<?= $this->include("layout/header") ?>

<div class="container mb-3 mt-2">
  <div class="row justify-content-center">
    <h2 style="font-style: italic;">View Articles</h2>
  </div>
</div>
<div class="container  mb-2 d-flex justify-content-start ">
<form method="get" action="<?= site_url('articles/view_all_articles') ?>" class="d-flex">
    <div class="form-group container m-0 me-2">
        <input type="text" class ="form-control" name="search" placeholder="Search here" value="<?= $search ?>">
    </div>
    <button type="submit" class="btn btn-dark">Search</button>
</form>
</div>

<div class="container col-md-12 col-lg-12 col-xs-12 col-sm-12  ">
    <div class="container card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover  ">
            <thead>
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article['id']; ?></td>
                    <td><a href='<?= site_url("articles/show/{$article['id']}"); ?>'><?= $article['title']; ?></a></td>
                    <td>                       
                        <?php if ($article['image']) : ?>
                            <img src="<?= base_url('public/uploads/' . $article['image']) ?>" alt="Article Image" style="max-width: 100px; height: auto;">
                        <?php else : ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?= substr($article['content'], 0, 150) . '...' ?></td>
                    <td><?= $article['status']; ?></td>
                    <td><a href='<?= site_url("articles/edit/{$article['id']}"); ?>'>Edit</a></td>
                    <td><a href='javascript:void(0);' onclick='confirmDelete(<?= $article['id']; ?>)'>Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>
<div class="container">
<nav aria-label="...">
   <ul class="pagination">
      <?php echo $pager->links(); ?>
   </ul>
</nav>
</div>
<script type="text/javascript">
    function confirmDelete(articleId) {
        if (confirm("Are you sure you want to delete this article?")) {
            window.location.href = '<?= site_url("articles/delete/"); ?>' + articleId;
        }
    }
</script>
<?= $this->include("layout/footer") ?>