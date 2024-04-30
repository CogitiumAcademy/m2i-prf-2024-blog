
<?php require 'template/partials/header.inc.php'; ?>

        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2>Modification mot de passe</h2>
                        <div class="my-5">
                            <form id="contactForm" action="?page=password" method="post">
                                
                                <div class="form-floating">
                                    <input name="old_password" class="form-control" id="name" type="password" placeholder="Entrez votre mot de passe actuel..." required>
                                    <label for="name">Mot de passe actuel</label>
                                </div>

                                <div class="form-floating">
                                    <input name="new1_password" class="form-control" id="name" type="password" placeholder="Entrez votre nouveau mot de passe..." required>
                                    <label for="name">Nouveau mot de passe</label>
                                </div>

                                <div class="form-floating">
                                    <input name="new2_password" class="form-control" id="name" type="password" placeholder="Répétez votre nouveau mot de passe..." required>
                                    <label for="name">Nouveau mot de passe</label>
                                </div>
                                <br />

                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Confirmer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require 'template/partials/footer.inc.php'; ?>
