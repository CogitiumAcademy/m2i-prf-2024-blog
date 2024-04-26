<?php require("partials/header.inc.php"); ?>

        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        
                        <p><?= $post["content"] ?></p>
                        
                        <h2>Les commentaires :</h2>
                        <?php if (empty($comments)) { ?>
                            Soyez le premier à commenter cet article !
                        <?php } ?>
                        <ul class="list-group">
                            <?php foreach ($comments as $comment) { ?>
                                <li class="list-group-item">
                                    Le <?= $comment["createdAt"] ?>, <?= $comment["firstName"] ?> <?= $comment["lastName"] ?> a écrit : <br>
                                    <b><?= $comment["content"] ?></b>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            </div>
        </article>


<?php require("partials/footer.inc.php"); ?>
