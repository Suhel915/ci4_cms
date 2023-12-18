<?= $this->include("layout/header"); ?>
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <div class="card ">
                <article>
                    <div class="card-header">
                    <h2 style="font-style: italic;">Edit Article</h2>
                    </div>
                    <div class="card-body">
                    <form method="post" action="<?=url_to('Articles::update',$article['id'])?>" enctype="multipart/     form-data">
                            <div class="mb-3 col-sm-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" value="<?= $article['title']?>" type="title" class="form-control" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea type = "text" name="content" class="form-control" id="content" cols="30" rows="5"><?= $article['content']?></textarea>
                            </div>
                            <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Update</button>
                        </form>
                    </div>
               
                </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include("layout/footer") ?>