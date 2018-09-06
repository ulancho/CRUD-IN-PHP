<div class="container" id="LoginForm">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h5>Вход в админ панель</h5>
            </div>
            <div class="error-div">
                <img class="error-img" src="images/admin.png" alt="" height="80" width="80" style="padding: 5px;">
            </div>
            <form id="Login" method="post">
                <?php if(!empty($pageData['error'])) :?>
                    <p style="text-align: center; color: red"><?php echo $pageData['error']; ?></p>
                <?php endif; ?>
                <div class="form-group">
                    <input type="text" name="login" class="form-control" id="inputEmail" placeholder="Введите логин" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Введите пароль" required>
                </div>
                <button type="submit" class="btn btn-primary">ВХОД</button>
            </form>
        </div>
    </div>

