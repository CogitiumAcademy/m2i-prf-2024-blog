<?php require("partials/header.inc.php"); ?>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    
                    <?php foreach ($posts as $post) { ?>

                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="?page=post&slug=<?= $post["slug"] ?>">
                            <h2 class="post-title"><?= $post["title"] ?></h2>
                            <img class="w-50" src="<?= $post["image"] ?>" alt="">
                            <h3 class="post-subtitle"><?= $post["content"] ?>...</h3>
                        </a>
                        <p class="post-meta">
                            Rédigé par
                            <a href="#!"><?= $post["firstName"] ?> <?= $post["lastName"] ?></a>
                            le <?= $post["createdAt"] ?>
                            classé dans
                            <?= $post["name"] ?>
                        </p>
                    </div>

                    <!-- Divider-->
                    <hr class="my-4" />

                    <?php } ?>


                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                
                </div>
            </div>
        </div>

<?php require("partials/footer.inc.php"); ?>
