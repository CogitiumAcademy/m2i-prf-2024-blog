<?php require 'template/partials/header.inc.php'; ?>

<!-- Généré côté front-end (FORMULAIRE) -->

<!-- Titre -->
<!-- Contenu -->
<!-- URL image -->
<!-- Liste déroulante des catégories -->

<!-- Généré côté back-end -->

<!-- date DATETIME -->
<!-- user (l'utilisateur connecté, est l'auteur de l'article) -->
<!-- slug (FONCTION A FAIRE) -->
<!-- active (true) -->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Proposer un article à publier</h2>
                <div class="my-5">
                    <form id="contactForm" method='post' action='?page=addpost'>
                        <div class="form-floating">
                            <input class="form-control" type="text" id="title" name="title" required>
                            <label for="title">Titre</label>
                        </div>
                        <div class="mt-2">
                            <textarea class="form-control" id="content" name="content" rows="5" cols="33"></textarea>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" id="image" name="image" required>
                            <label for="image">Illustration</label>
                        </div>
                        <div class="mt-2">
                            <select class="form-control" name="category" id="category">
                                <option selected>-- Choisissez une catégorie --</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="btn btn-primary text-uppercase w-100 mt-5"
                                id="submitButton" type="submit">Soumettre mon article
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require 'template/partials/footer.inc.php'; ?>
