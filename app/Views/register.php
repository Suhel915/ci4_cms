<?= $this->include("layout/header") ?>
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              
                <div class="card ">
                    <div class="card-header text-bg-dark">
                        <h5>Registration</h5>
                    </div>
                    <div class="card-body">
                        <form  method="post">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            
                            <div class="form-group mb-3">
                            
                                <label for="name">Email</label>
                                <input type="text" name="email" class="form-control" required>
                                <?php if (isset($validationErrors['email'])) {
                                        echo "Invalid Email";
                                    } ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>
                                <?php if (isset($validationErrors['phone'])) {
                                        echo "Invalid Phone Number";
                                    } ?>
                                
                            </div>
                             
                            <div class="form-group mb-3">
                                <label for="name">Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-outline-dark">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include("layout/footer") ?>