
<?= $this->include("layout/header") ?>

<!-- <h1>Login</h1> -->
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              
                <div class="card">
                    <div class="card-header  text-bg-dark">
                        <h3>Login</h3>
                        </div>
                        <div class="card-body">
                        <form method="post" action = "<?= site_url('login'); ?>" >
                        <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class ="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class ="form-control"  required>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="register_btn" class="btn btn-outline-dark">Login</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
              
<?= $this->include("layout/footer") ?>            