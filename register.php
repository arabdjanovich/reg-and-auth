<?php
    session_start();
    $title = 'Регистрация';
    include_once 'includes/header.php';
    include_once 'includes/navbar.php';
?>
<div class="py5 somsa">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Регистрация</h5>
                    </div>
                    <div class="card-body">

                        <form action="check.php" method="post">
                            <div class="form-group mb-3">
                                <label for="firstname">Имя</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Почта</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Номер телефона</label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="cpassword">Повторный пароль</label>
                                <input type="password" name="cpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="registerbtn" class="btn btn-primary">Зарегистрироваться</button>
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
