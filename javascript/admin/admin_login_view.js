$(document).ready(function() {

    $('form').submit(function(e) {
        e.preventDefault();

        let admin_name = $('#admin_name').val();
        let admin_pass = $('#admin_pass').val();

        if (admin_name != "" && admin_pass != "") {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../controller/admin/admin_login_request.php",
                data: {
                    admin_name: admin_name,
                    admin_pass: admin_pass
                },
                success: function(response) {

                    window.localStorage.setItem("admin_id", response[0].admin_id);
                    window.localStorage.setItem("admin_name", response[0].admin_name);
                    window.localStorage.setItem("admin_pass", response[0].admin_pass);

                    if (response[0].admin_name == admin_name && response[0].admin_pass == admin_pass) {

                        Swal.fire(
                            'สำเร็จ',
                            'ล็อคอินสำเร็จ',
                            'success'
                        ).then(function() {
                            window.location.href = "../../view/admin/admin_page_view.php";
                        });

                    } else {

                        Swal.fire(
                            'ผิดพลาด',
                            'รหัสผ่านไม่ถูกต้อง',
                            'error'
                        ).then(function(result) {
                            window.location.reload();
                        });
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

        } else {

            Swal.fire(
                'คำเตือน',
                'กรุณากรอกข้อมูลให้ครบถ้วน!',
                'warning'
            ).then(function(result) {
                window.location.reload();
            });
        }
    });
});