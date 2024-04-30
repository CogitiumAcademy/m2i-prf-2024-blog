
<?php require 'template/partials/header.inc.php'; ?>

        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2>Mon profil</h2>
                        <div class="my-5">
                            <form id="contactForm" action="?page=profil" method="post">

                                <div class="form-floating">
                                    <input name="role" class="form-control" id="role" type="text" disabled="disabled" value="<?= $user['role'] ?>">
                                    <label for="email">Role</label>
                                </div>

                                <div class="form-floating">
                                    <input name="firstName" class="form-control" id="firstName" type="text" placeholder="Entrez votre prénom..." value="<?= $user['firstName'] ?>">
                                    <label for="firstName">Prénom</label>
                                </div>

                                <div class="form-floating">
                                    <input name="lastName" class="form-control" id="lastName" type="text" placeholder="Entrez votre nom..." value="<?= $user['lastName'] ?>">
                                    <label for="lastName">Nom</label>
                                </div>

                                <div class="form-floating">
                                    <input name="email" class="form-control" id="email" type="email" disabled="disabled" value="<?= $user['email'] ?>">
                                    <label for="email">Email</label>
                                </div>
                                
                                <div class="form-floating">
                                    <input name="phone" class="form-control" id="phone" type="text" placeholder="Entrez votre numéro de téléphone..." value="<?= $user['phone'] ?>">
                                    <label for="phone">Téléphone</label>
                                </div>
                                <br />

                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Enregistrer</button>
                                <a href="?page=password" class="btn btn-primary">Modifier mon mot de passe</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require 'template/partials/footer.inc.php'; ?>
