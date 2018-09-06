<div class="col-lg-8 col-lg-offset-2">
    <p style="text-align: center; color:white; font-size: 18px;font-weight: 900;background: red"><?=$pageData['txt']?></p>
    <div class="panel panel-primary">
        <div style="height: 60px;background: #2780e3">
            <div  class="col-sm-6">
                <h3>Пользователи</h3>
            </div>
            <div  class="col-sm-6">
                <button  data-toggle="modal" data-target="#addNewUser" style="height: 50px;float: right;margin-top: 5px;" class="btn btn-default">Добавление</button>
            </div>
        </div>
        <div class="panel-body">
            <table id="user_table" class="table table-bordered">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Логин</th>
                    <th>Редактирование</th>
                    <th>Удаление</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($pageData['usersList'] as $value): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class="td" style="font-size: 17px;font-weight: 900;font-style: italic;"
                        data-login="<?= $value['login'] ?>"
                        data-name="<?= $value['name'] ?>"
                        data-surname="<?= $value['surname'] ?>"
                        data-gender="<?= $value['gender'] ?>"
                        data-birthday="<?= $value['birthday'] ?>"
                    ><?= $value['name'] ?></td>
                    <td>
                        <button class="btn btn-primary update_user_modal"
                                data-id="<?= $value['id'] ?>"
                                data-login="<?= $value['login'] ?>"
                                data-name="<?= $value['name'] ?>"
                                data-surname="<?= $value['surname'] ?>"
                                data-gender="<?= $value['gender'] ?>"
                                data-birthday="<?= $value['birthday'] ?>"
                        >Редактирование
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-primary delete_user"
                                data-id="<?= $value['id'] ?>"
                                data-login="<?= $value['login'] ?>"
                        >Удаление
                        </button>
                    </td>
                </tr>
                <?php $i++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="text-center">
            <?=$pageData['pagination']?>
        </div>

    </div>

    <!-- Modal update users-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Редактирование пользователя</h4>
                </div>

                <div id="ok_users" class="alert alert-info" style="text-align: center;font-size:16px; display: none">
                    <strong>Отлично!</strong> Вы изменили данные пользавателя.
                </div>

                <div id="error_users" class="alert alert-warning"
                     style="text-align: center;font-size: 16px;background: red;display: none">
                    <strong>Cтоп!</strong> Произошла ошибка, заполните все поля.
                </div>

                <div class="modal-body">
                    <form action="javascript:void[0]" id="form_updateUsers">
                        <div class="form-group">
                            <input id="id" type="hidden" name="id" value="">
                            <label for="">Логин:</label>
                            <input id="login" class="form-control" type="text" name="login" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Имя:</label>
                            <input id="name" class="form-control" type="text" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Фамилия:</label>
                            <input id="surname" class="form-control" type="text" name="surname" value=""
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Пол:<i id="gen"></i> </label>
                            <select name="gender" class="form-control" id="sel1">
                                <option value="">Выберите пол</option>
                                <option value="1">М</option>
                                <option value="2">Ж</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">День-рождение:</label>
                            <input id="birthday" class="form-control day" type="text" name="birthday"
                                   value="" placeholder="dd/mm/yyyy" required>
                        </div>
                        <input id="for" type="submit" class="btn btn-primary" value="ИЗМЕНИТЬ">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal delete users-->
    <div class="modal fade" id="modal_delete_user" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Удаление ползователя</h4>
                </div>
                <div class="modal-body">
                    <p>Вы собираетесь удалить пользователя <strong class="fio_delete"></strong>.</p>
                    <h4>Вы точно хотите удалить?</h4>
                    <form action="cabinet/deleteUserid" method="post">
                        <input id="id_for_del" type="hidden" name="idUser" value="">
                        <input type="submit" class="btn btn-primary btn-default" value="Да"></input>
                    </form>
                    <br>
                    <a href="/cabinet">
                        <button class="btn btn-primary btn-default">Нет,Назад</button>
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

<!--    Modal add new user-->
    <div class="modal fade" id="addNewUser" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Добавление нового пользователя</h4>
                </div>
                <div class="modal-body">
                    <form action="cabinet/addUser" id="form_add_user" method="post">
                        <div class="form-group">
                            <label for="">Имя:</label>
                            <input  class="form-control" type="text" name="name" placeholder="Введите Имя" required>
                        </div>
                        <div class="form-group">
                            <label for="">Фамилия:</label>
                            <input class="form-control" type="text" name="surname" placeholder="Введите Фамилию"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Логин:</label>
                            <input class="form-control" type="text" name="login" placeholder="Введите Логин"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Дата рождение:</label>
                            <input class="form-control day" type="text" name="birthday" placeholder="Введите дату"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Пароль:</label>
                            <input class="form-control" type="password" name="paswwd" placeholder="Введите пароль"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Пол:</label>
                            <select name="gen" class="form-control">
                                <option value="">Выберите:</option>
                                <option value="1">М</option>
                                <option value="2">Ж</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Роль:</label>
                            <select name="role" class="form-control">
                                <option value="">Выберите:</option>
                                <option value="1">Админ</option>
                                <option value="2">Пользователь</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-block" value="Добавить">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <!--    Modal view user-->
    <div class="modal fade" id="viewUser" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center view">
                    <p>Имя: <strong class="view_name"></strong></p>
                    <p>Фамилия: <strong class="view_surname"></strong></p>
                    <p>Логин: <strong class="view_login"></strong></p>
                    <p>Дата рождение: <strong class="view_day"></strong></p>
                    <p>Роль: <strong class="view_role"></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    jQuery(function ($) {
        $(".day").mask("99/99/9999");
    });
</script>