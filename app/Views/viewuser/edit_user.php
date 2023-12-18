<?= $this->include("layout/header") ?>

<!-- <h1>Edit User</h1> -->
<div class="py-5">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h2 style="font-style: italic;">Edit User</h2>
                    <form method="post" action  ="<?= site_url("Viewuser/update_user/{$user['id']}"); ?>">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input class = "form-control" type="text" id="name" name="name" value="<?= $user['name']; ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class = "form-control" type="email" id="email" name="email" value="<?= $user['email']; ?>" required>
                            <?php if (isset($validationErrors['email'])){
                                echo "Invalid Email";
                            } ?>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input class = "form-control" type="text" id="phone" name="phone" value="<?= $user['phone']; ?>" required>
                            <?php if (isset($validationErrors['phone'])){
                                echo "Invalid Phone Number";
                            } ?>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea class = "form-control" id="address" name="address" required><?= $user['address']; ?></textarea>
                        </div>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                        <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="admin">Admin</option>
                                        <option value="subscriber">Subscriber</option>
                                    </select>
                            </div>
                            <?php endif;?>
                        <div class="form-group">
                            <button type="submit" name="update_btn" class="btn btn-outline-dark">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
