<?php
$user = $_SESSION['user'];
?>

<div class="col-lg-4 col-lg-offset-4">
    <h2 style="text-align: center">Изменить профиль</h2>
    <div id="ok_profile" class="alert alert-success" style="text-align: center;display:none">
        <strong>Поздравляю!</strong> Ваш профиль успешно изменен.
    </div>
    <div id="error_profile" class="alert alert-danger" style="text-align: center; display: none">
        <strong>Стоп!</strong> Произошла ошибка, повторите заново.
    </div>
    <form action="javascript:void[0]" id="form_updateProfile">
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <label for="">Логин:</label>
            <input class="form-control" type="text" name="login" value="<?= $user['login'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Имя:</label>
            <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="">Фамилия:</label>
            <input class="form-control" type="text" name="surname" value="<?= $user['surname'] ?>" required>
        </div>

        <div class="form-group">
            <label for="sel1">Пол:</label>
            <select name="gender" class="form-control" id="sel1">
                <?php
                if ($user['gender'] == "1"){
                    $sel1 = 'selected';
                    $sel2 = '';
                }
                else{
                       $sel1 = '';
                       $sel2 = 'selected';
                }
                ?>
                <option <?=$sel1?> value="0">М</option>
                <option <?=$sel2?> value="1">Ж</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">День-рождение:</label>
            <input id="birthday" class="form-control" type="text" name="birthday" value="<?= $user['birthday'] ?>" placeholder="dd/mm/yyyy" required>
        </div>
        <input id="for" type="submit" class="btn btn-primary" value="ИЗМЕНИТЬ">
    </form>
</div>

<script>
    jQuery(function($){
        $("#birthday").mask("99/99/9999");
    });
</script>