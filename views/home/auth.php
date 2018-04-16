<!DOCTYPE html>
<html>

<?php
include_once ROOT.'/views/includes/head.php'; ?>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Аналитика<b> ГК Like</b></a>
        <small></small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in">

                <div class="msg"><span class="error" style="color: red;font-size: 25px"><?php echo $error;?></span></div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once ROOT.'/views/includes/script.php'; ?>
</body>

</html>