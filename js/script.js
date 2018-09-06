$(document).ready(function () {
    // for entry, check for emptiness
    $("#Login").submit(function (e) {
        e.preventDefault();
        var login = $.trim($("#inputEmail").val());
        var password = $.trim($("#inputPassword").val());

        if (login == '' || password == '') {
            e.preventDefault();
            $("img.error-img").attr("src", "images/error1.png");
        }
        else {
            $(this).unbind().submit();
        }
    });

    //update profile admin
    $('#form_updateProfile').on('submit', function () {
        var form = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: "profile/updateProfile",
            data: form,
            contentType: false,
            processData: false,
            success: function ($data) {
                if ($data['ok']) {
                    $('#ok_profile').show();
                }
                else {
                    $('#error_profile').show();
                }
            },
        });
    });

    $('.update_user_modal').on('click', function () {
        var id = $(this).data("id");
        var login = $(this).data("login");
        var name = $(this).data("name");
        var surname = $(this).data("surname");
        var gender = $(this).data("gender");
        var birthday = $(this).data("birthday");

        if (gender == "1") {
            var gender = "M";
        }
        else if (gender == "2") {
            var gender = "Ж";
        }
        $('#myModal').modal();
        $('#id').val(id);
        $('#login').val(login);
        $('#name').val(name);
        $('#surname').val(surname);
        $('#gen').html(gender);
        $('#birthday').val(birthday);

    });

    //update users
    $('#form_updateUsers').on('submit', function () {
        var form = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: "cabinet/updateUsers",
            data: form,
            contentType: false,
            processData: false,
            success: function ($data) {
                if ($data['ok']) {
                    $('#ok_users').show();
                }
                else {
                    $('#error_users').show();
                }
            },
        });
    });

//   to open modal delete users
    $('.delete_user').on('click', function () {
        var id = $(this).data('id');
        var login = $(this).data('login');

        $('.fio_delete').html(login);
        $('#id_for_del').val(id);
        $('#modal_delete_user').modal();
    });

    //   to open modal views user
    $('.td').on('click', function () {
        var login = $(this).data('login');
        var name = $(this).data('name');
        var surname = $(this).data('surname');
        var gender = $(this).data('gender');
        var birthday = $(this).data('birthday');

        if (gender == "1") {
            var gender = "M";
        }
        else if (gender == "2") {
            var gender = "Ж";
        }
        else{
            var gender = "---";
        }

        $('.view_name').html(name);
        $('.view_surname').html(surname);
        $('.view_login').html(login);
        $('.view_day').html(birthday);
        $('.view_role').html(gender);

        $('#viewUser').modal();
    });



});