<?php
    session_start();
    $title = 'Авторизация';
    include_once 'includes/header.php';
    include_once 'includes/navbar.php';
?>
<div class="py5 somsa">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Авторизация</h5>
                    </div>
                    <div class="card-body">

                        <form action="auth.php" method="post">
                            <div class="form-group mb-3">
                                <label for="email">Почта</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="loginbtn" class="btn btn-primary">Авторизоваться</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
    include_once 'includes/footer.php';
?>