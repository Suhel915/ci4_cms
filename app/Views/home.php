<?= $this->include("layout/header") ?>

<div class="container mt-3">
    <div class="row justify-content-center">
        <h1 style="font-style: italic;">All Posts</h1>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($articles as $article): ?>
        <div class="col-md-6 mb-4">
            <div class=" card text-bg-light">
              <div class="card-header text-bg-dark">
              <h5 class="card-title"><?= $article['title'] ?></h5>
              </div>
                <div class="card-body"  style="display: flex; flex-direction: column; align-items: center;"> 
                <?php if ($article['image']): ?>
                            <img src="<?= base_url('public/uploads/' . $article['image']) ?>" class="img-fluid mb-2" alt="Article Image" style="max-width: 300px; height: 300px;>
                        <?php endif; ?>
                    <p class="card-text"><?= substr($article['content'], 0, 150) . '...' ?></p>
                    <a href="<?= base_url('articles/show/' . $article['id']) ?>" class="btn btn-outline-dark">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container mt-4">
    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <?= $pager->links() ?>
        </ul>
    </nav>
</div>
<?= $this->include("layout/footer") ?>