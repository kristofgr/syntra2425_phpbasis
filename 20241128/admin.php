<?php
require('functions.inc.php');
requiredLoggedIn();

$pageTitle = "Admin home";
require('head.inc.php');

$articles = getArticles();

print '<pre>';
// print_r($_SESSION);
// print_r($articles);
print_r($_POST);
print '</pre>';
?>

<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Admin pagina</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">

                        <div class="alert text-white bg-primary d-flex align-items-center justify-content-between" role="alert">
                            <div class="alert-text">A simple <b>primary</b> alert—check it out!</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>


                        <div class="table-responsive m-b-30">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Publication date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $article): ?>
                                        <tr>
                                            <th scope="row"><?= $article['id']; ?></th>
                                            <td><?= mb_strimwidth($article['title'], 0, 30, '...'); ?></td>
                                            <td><?= $article['users_name']; ?></td>
                                            <td><?= $article['status'] ? 'published' : 'unpublished'; ?></td>
                                            <td><?= date('j M Y', strtotime($article['publication_date'])); ?></td>
                                            <td>
                                                <form method="post" action="admin.php">
                                                    <button type="submit" class="btn btn-primary" name="delete" value="<?= $article['id']; ?>">
                                                        delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>



                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require('footer.inc.php'); ?>