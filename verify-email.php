<?php
    session_start();
    $title = 'Подтверждение почты';
    include_once 'includes/header.php';
    include_once 'includes/navbar.php';
    include_once 'config/database.php';
?>
<div class="py5 somsa">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Потверждение почты</h5>
                    </div>
                    <div class="card-body">

                        <form action="verify.php" method="GET" class="row g-3">
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Почта</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="<?=$_SESSION['email'];?>">
                            </div>
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Код</label>
                                <input type="number" name="token" class="form-control" id="inputPassword2" placeholder="Код">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Подтвердить</button>
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
