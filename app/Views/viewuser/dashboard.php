<?= $this->include("layout/header") ?>
<div class="jumbotron text-center mt-4 ">
    <h2 style="font-style: italic;">Admin Dashboard</h2>
</div>
<!-- /.row -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card ">
                <div class="card-heading text-bg-info ">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file fa-5x" style ="color: #ffffff; "></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
                                    <strong><?= $totalArticles ?></strong>
                                </div>
                                <div>All Posts</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url("/") ?>">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card card-danger">
                <div class="card-heading text-bg-danger">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
                                    <strong><?= $totalComments ?></strong>
                                </div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card card-yellow">
                <div class="card-heading text-bg-warning">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"style ="color: #ffffff; "></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
                                    <strong><?= $totalUsers ?></strong>
                                </div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url("/users") ?>">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card card-red">
                <div class="card-heading text-bg-success">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'>
                                    <strong><?= $activeUsers ?></strong>
                                </div>
                                <div>User Online</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('users') ?>">
                    <div class="card-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="container col-md-12 col-lg-12 col-xs-12 col-sm-12 mt-4 mb-4">
    <div class="row">

        <script type="text/javascript">

            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Overall Data', 'Count'],
                    <?php $element_text = ['Total Users', 'Total Articles', 'Article Publish', 'Article Draft', 'Total Admin', 'Total Subscriber', 'Total Comments', 'Active Users'];
                    $element_count = [$totalUsers, $totalArticles, $totalPublish, $totalDraft, $totalAdmins, $totalSubscribers, $totalComments, $activeUsers];

                    for ($i = 0; $i < 8; $i++) {
                        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

                    }


                    ?>
                ]);

                var options = {
                    chart: {
                        title: 'Total Users and Articles',
                        subtitle: '',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

        <div id="columnchart_material" style="width: 100%; height: 600px;"></div>
    </div>
</div>
<?= $this->include("layout/footer") ?>