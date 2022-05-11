$(document).ready(function() {

    if (localStorage.getItem("user_id") == null) {
        window.location.href = "../../view/auth/user_login_view.php";
    }

    $('#submit_form_ATK').submit(function(e) {
        e.preventDefault();

        let user_id = localStorage.getItem("user_id");
        let username = localStorage.getItem("username");
        let password = localStorage.getItem("password");

        let Form_Data_ATK = new FormData($(this)[0]);
        Form_Data_ATK.append("user_id", user_id);

        $.ajax({
            type: "post",
            url: "../../controller/auth/auth_request_form_atk.php",
            data: Form_Data_ATK,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                //console.log(response);
                if (response != 0) {
                    Swal.fire(
                        'สำเร็จ',
                        'บันทึกข้อมูลสำเร็จ',
                        'success'
                    ).then(function(result) {
                        $("#img").attr("src", response);
                        $(".preview img").show();
                        setTimeout(function() {
                            window.location.href = "../../view/auth/user_profile_view.php";
                        }, 1000);
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
                        'ออกจากระบบ',
                        'สำเร็จ',
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