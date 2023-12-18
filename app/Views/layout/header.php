<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            margin-top: auto;
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }
        a {
            text-decoration: none;
        }
          
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url("home") ?>">PHP</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-left">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('Home')?>">Home</a>
                    </li>
                    <?php if (isset($_SESSION['id'])) : ?>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="articlesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Articles
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="articlesDropdown">
                                    <li><a class="dropdown-item" href="<?= base_url('articles/new')?>">New Article</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('articles/view_all_articles')?>">View All Articles</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('articles')?>">My Article</a></li>
                                </ul>
                            </div>
                        </li>
`
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="UsersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    View
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="UsersDropdown">
                                    <li><a class="dropdown-item" href="<?= base_url('viewuser/dashboard')?>">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('/users')?>">View All Users</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('articles/view_all_comments')?>">View All Comments</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('login/logout')?>">Logout</a>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('login')?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('register')?>">Register</a>
                        </li>        
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['name'])) : ?>
                    <ul class="navbar-nav ms-auto nav-link active">
                        <li class="nav-item">
                            <a href="<?= base_url("users/edit/{$_SESSION['id']}"); ?>"><span class="nav-link active mt-3">User, <b><?= $_SESSION['name'] ?></b></span></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>   
</body>
</html>
