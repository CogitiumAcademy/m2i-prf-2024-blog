<?php require("partials/header.inc.php"); ?>

        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Créez un compte pour participer au blog !</p>
                        <div class="my-5">
                            <form id="contactForm" method="post" action="?page=register">
                                <div class="form-floating">
                                    <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Entrez votre prénom..." required>
                                    <label for="firstname">Prénom</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Entrez votre nom..." required>
                                    <label for="lastname">Nom</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Entrez votre mail..." required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Entrez votre numéro de téléphone...">
                                    <label for="phone">Téléphone</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Entrez votre mot de passe..." required>
                                    <label for="password">Mot de passe</label>
                                </div>
                                <br />
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">M'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php require("partials/footer.inc.php"); ?>
