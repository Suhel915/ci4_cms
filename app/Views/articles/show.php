<?= $this->include("layout/header"); ?> 

<div class="py-4">
    <div class="container mb-4 ">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card rounded shadow bg-white">
                    <article>
                        <?php if (!empty($article)): ?>
                            <div class="card-header text-bg-dark">
                                <h2><?= $article['title'] ?></h2>
                            </div>
                            <div class="card-body text-center">
                                <?php if ($article['image']): ?>
                                    <img src="<?= base_url('public/uploads/' . $article['image']) ?>" class="img-fluid mb-2" alt="Article Image" style="max-width: 300px; height: auto;">
                                <?php endif; ?>

                                <p><?= $article['content'] ?></p>

                                <?php
                                $loggedInUserId = session()->get('id');
                                $articleUserId = $article['user_id'];

                                if ($loggedInUserId === $articleUserId && isset($_SESSION['id'])) :
                                    ?>
                                   
                                    <a class="btn btn-outline-info" href="<?= url_to("Articles::edit", $article['id']) ?>">Edit</a>
                                    <a class="btn btn-outline-danger" href="<?= url_to("Articles::delete", $article['id']) ?>">Delete</a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="card-body text-center"> 
                                <p>Article not found.</p>
                            </div>
                        <?php endif; ?>
                    </article>
                    
                  
                    <div class="container mb-4">
                        <div class="row justify-content-center">
                            <div class="col-md-10 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                    <h4>Comments</h4>
                                    <form method="post" action="<?= site_url("articles/comment/{$articleId}") ?>">
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="feedback">Feedback</label>
                                                <textarea class="form-control" id="feedback" name="feedback" required></textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="submit" name="submit" class="btn btn-outline-dark">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-body">
                                        <!-- <a href="<?= base_url('articles/showComment/' . $articleId) ?>" class="btn btn-outline-info mb-3">All Comments</a> -->

                                        <?php if (!empty($comments)) : ?>
                                            <h4>Comments:</h4>
                                            <div class="list-group">
                                                <?php foreach ($comments as $comment) : ?>
                                                    <div class="list-group-item">
                                                        <div>
                                                            <h6><strong><?= $comment['email']?>:</strong></h6> <?= $comment['feedback'] ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else : ?>
                                            <p>No comments yet.</p>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   





                    
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include("layout/footer") ?> 
