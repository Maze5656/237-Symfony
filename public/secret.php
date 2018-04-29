<?php

function authenticated($username, $password) : bool {
    if ($username === 'user' && $password === 'secret') {
        return true;
    } else {
        return false;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Secret Page</title>
<!-- md.bootstrap.com template -->
</head>

<body class="fixed-sn">
<?php
if (!isset($_POST['username']) && !isset($_POST['password'])) {
?>

    <main>
        <section class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-center">Login</h1>
                            <form method="POST">
                                <div class="md-form">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"/>
                                </div>

                                <div class="md-form">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"/>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-light-blue">Login</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
} else if (authenticated($_POST['username'], $_POST['password'])) {
?>

<h1 class="text-center mt-5">Hey there user!</h1>
<?php } else { ?>

<h1 class="text-center mt-5">YOU shall not pass!</h1>
<?php } ?>

</body>
</html>