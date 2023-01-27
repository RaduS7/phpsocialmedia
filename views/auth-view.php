<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("auth-helper.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <div class="container" style="display: flex; justify-content: center;">
            <?php
            if (isset($_SESSION['authstate'])) {
                if ($_SESSION['authstate'] == 'accinvalid') {
                    echo "<h1 class='text-2xl font-bold'> Wrong Credentials! </h1>";
                } else if ($_SESSION['authstate'] == 'accex') {
                    echo "<h1 class='text-2xl font-bold'> Account Already Exists </h1>";
                } else if ($_SESSION['authstate'] == 'accconn') {
                    echo "<h1 class='text-2xl font-bold'> Connected! </h1>";
                }
            }
            ?>
        </div>

        <div class="container" style="display: flex; justify-content: center;">

            <form action="auth" class="mt-3" method="post">
                <div class="form-group mt-3">
                    <label class="font-bold">Name</label>
                    <input type="text" class="form-control" name="user"
                        placeholder="<?=(isset($_SESSION['credentials']) && $_SESSION['authstate'] == "accconn") ? $_SESSION['credentials'][0] : 'Enter name' ?>"
                        <?=(isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn") ? 'disabled' : '' ?>>
                </div>

                <?php if (!(isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn")) { ?>

                    <div class="form-group mt-3">
                        <label class="font-bold">Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                    </div>

                    <button class="btn btn-info bg-info  my-2" type="submit" value="Connect" name="verify">Connect</button>
                    <button class="btn btn-success bg-success  ml-2 my-2" type="submit" value="Create Account"
                        name="createaccount">Create Account</button>

                <?php } else { ?>

                    <button class="btn btn-danger bg-danger  my-2" type="submit" value="Disconnect"
                        name="disconnect">Disconnect</button>

                <?php } ?>
            </form>
        </div>

    </div>
</main>

<?php require("components/footer.php") ?>