    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="content">
            <small>© <?=date('Y')?>. All rights reserved | Powered by badr</small>
    </div>

    <script src="js/sweetalert.min.js"></script>

    <?php 
        if(isset($_SESSION['status']) != ''){ 
    ?>
        <script>
            swal({
                //title: "<?=$_SESSION['status'];?>",
                text: "<?=$_SESSION['status'];?>",
                icon: "<?=$_SESSION['status_code'];?>",
                button: "OK",
            });
        </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
        } 
    ?>
</body>
</html>