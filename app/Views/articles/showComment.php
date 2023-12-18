
<?= $this->include("layout/header") ?>
<div class="container">
<div class="card">
<form  method="post" action="<?= site_url("articles/showComment/".$articleId) ?>">  

                                    <?php if (!empty($comments)):  ?>
                                            <h4>Comments:</h2>
                                            <?php foreach ($comments as $comment) : ?>
                                                <div>
                                                    <p><strong><?= $comment['email'] ?>:</strong> <?= $comment['feedback'] ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p>No comments yet.</p>
                                        <?php endif; ?>
          
                                   
                                    </form>
                                    </div>
                                    </div>
<?= $this->include("layout/footer") ?>             
