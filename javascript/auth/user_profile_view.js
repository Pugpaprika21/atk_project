$(document).ready(function() {

    if (localStorage.getItem("user_id") == null) {
        window.location.href = "../../view/auth/user_login_view.php";
    }

    $('#txt_username').text(localStorage.getItem("username"));

    let user_id = localStorage.getItem("user_id");

    $('#edit_profile').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../../controller/auth/auth_edit_profile_request.php",
            data: {
                user_id: user_id,
                username: $('#username').val(),
                password: $('#password').val(),
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                gender: $('#gender').val(),
                phone: $('#phone').val(),
                email: $('#email').val()
            },
            dataType: "json",
            success: function(response) {

                if (response) {
                    Swal.fire(
                        'สำเร็จ!',
                        'เเก้ไขโปรไฟล์ สำเร็จ',
                        'success'
                    ).then(function() {
                        window.location.href =
                            "../../view/auth/user_profile_view.php";
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#pills-profile-tab').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../controller/auth/auth_show_profile_ByID.php",
            data: {
                user_id: user_id
            },
            success: function(response) {

                response.forEach(function(user) {
                    $('#username').val(user.username);
                    $('#password').val(user.password);
                    $('#firstname').val(user.firstname);
                    $('#lastname').val(user.lastname);
                    $('#gender').val(user.gender);
                    $('#phone').val(user.phone);
                    $('#email').val(user.email);
                });

            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    var count = 1;

    $('#pills-atk-tab').click(function(e) {
        e.preventDefault();

        (count++ == 2) ?  window.location.reload() : "";

        let thaiDate = function(date_input) {
            const date = new Date(date_input);
            return date.toLocaleDateString('th-TH', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            });
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../../controller/auth/auth_show_request_atkData.php",
            data: {
                user_id: user_id
            },
            success: function(response_atk) {

                let html = ``;

                if (response_atk == null) {

                    html = `
                        <div class="alert alert-primary" role="alert">
                            ไม่พบข้อมูล ATK ของคุณ : ${response_atk.firstname}
                        </div>
                    `;

                    $('#show_atk_detail').append(html);

                } else {

                    response_atk.forEach(function(atk_detail) {

                        html = `
                            <tr>
                                <td>${atk_detail.atk_id}</td>
                                <td>${atk_detail.firstname}</td>
                                <td>${atk_detail.lastname}</td>
                                <td>${atk_detail.location}</td>
                                <td>${thaiDate(atk_detail.date_atk_in)}</td>
                                <td>${thaiDate(atk_detail.date_atk_out)}</td>
                                <td>${thaiDate(atk_detail.form_date)}</td>
                                <td><img src="../../upload/auth/${atk_detail.filename}" style="width: 55px; height: 55px; border-radius: 30%"></td>
                            </tr>
                        `;

                        $('#show_atk_detail').append(html);

                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

});

function logout() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../controller/auth/auth_logout_request.php",
        data: {
            user_id: localStorage.getItem("user_id")
        },
        success: function(response) {
            if (response.status == 200) {
                setTimeout(function() {

                    Swal.fire(
                        'สำเร็จ',
                        'ออกจากระบบสำเร็จ',
                        'success'
                    ).then(function() {
                        window.localStorage.clear();
                        window.location.href = "../../view/auth/user_login_view.php";
                    });

                }, 1000);
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}