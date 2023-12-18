<?= $this->include("layout/header") ?>
<div class="container">
    <div class="container card-body mb-4 mt-5">
    <?php if (is_array($user)) : ?>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">User Information</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Id :</strong><span class="ms-2"> <?= $user['id']; ?></li>
                <li class="list-group-item"><strong>Name :</strong><span class="ms-2"> <?= "\r".$user['name']; ?></li>
                <li class="list-group-item"><strong>Email :</strong><span class="ms-2"> <?= $user['email']; ?></li>
                <li class="list-group-item"><strong>Phone Number : </strong><span class="ms-2">  <?= $user['phone']; ?></li>
                <li class="list-group-item"><strong>Address :</strong><span class="ms-2"><?= $user['address']; ?></li>
                <li class="list-group-item"><strong>Username :</strong><span class="ms-2"><?= substr($user['email'], 0, strpos($user['email'], '@')); ?></li>
                <li class="list-group-item"><strong>Created :</strong><span class="ms-2"><?= $user['created_at']; ?></li>
            </ul>
        </div>
    </div>
<?php else : ?>
    <div class="card">
        <div class="card-body">
            <p class="text-muted">User data not available.</p>
        </div>
    </div>
<?php endif; ?>


    </div>
</div>
<?= $this->include("layout/footer") ?>