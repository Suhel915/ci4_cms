<?= $this->include("layout/header") ?>


<div class="container mb-3 mt-2">
  <div class="row justify-content-center">
    <h2 style="font-style: italic;">View Users</h2>
  </div>
</div>
<div class="container mb-2 d-flex justify-content-start">
    <form method="get" action="<?= site_url('users') ?>" class="d-flex">
        <div class="form-group container m-0 me-2">
            <input type="text" class="form-control" name="search" placeholder="Search here" value="<?= service('request')->getGet('search') ?>">
        </div>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
</div>


<div class="container ">
    <div class="container card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <thead>
                <tr class='table-dark'>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Created</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><a href='<?= site_url("users/view/{$user['id']}"); ?>'><?= $user['name']; ?></a></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['phone']; ?></td>
                    <td><?= $user['address']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <!-- <td><?= substr($user['email'], 0, strpos($user['email'], '@')); ?></td> -->
                    <td><?= $user['created_at']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td><a class="btn btn-outline-info btn-sm" href='<?= site_url("users/edit/{$user['id']}"); ?>'>Edit</a></td>
                    <td><a  class="btn btn-outline-danger btn-sm"  href='javascript:void(0);' onclick='confirmDelete(<?= $user['id']; ?>)'>Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <nav aria-label="...">
   <ul class="pagination">
      <?php echo $pager->links(); ?>
   </ul>
</nav>
        
</div>      
    </div>
</div>


<script type="text/javascript">
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = '<?= site_url("users/delete/"); ?>' + userId;
        }
    }
</script>
<?= $this->include("layout/footer") ?>