<?php require 'template/partials/header.inc.php'; ?>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <h2>Connexion</h2>
                <div class="my-5">
                    <form id="loginForm" action="?page=login" method="post">

                        <div class="form-floating">
                            <input type="email" id="email" name="email"
                                   class="form-control">
                            <label for="email">E-mail</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" id="password" name="password"
                                   class="form-control">
                            <label for="password">Password</label>
                        </div>
                        <br>
                        <button class="btn btn-primary text-uppercase w-100">Login</button>
                        <a class="btn btn-outline-primary w-100 mt-1" href="?page=register">M'INSCRIRE</a>
                    </form>
                </div> <!-- /.my-5 -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</main>

<?php require 'template/partials/footer.inc.php'; ?>
