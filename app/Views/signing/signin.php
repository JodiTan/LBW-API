<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container text-center my-3">
    <form class="form-signin" action="" method="POST">
        <h2 class="my-3">Sign in</h2>

        <label for="inputUsername" class="sr-only">Username</label>
        <input type="username" id="inputUsername" class="form-control my-3" placeholder="Username" required="" autofocus="">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control my-3" placeholder="Password" required="">
        
        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>
<?= $this->endSection("content"); ?>