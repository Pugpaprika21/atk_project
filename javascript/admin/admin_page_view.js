$(document).ready(function() {
    if (window.localStorage.getItem("admin_id") == null) {
        window.location.href = "../../view/admin/admin_login_view.php";
    }

    loadUsers();
    loadATK();

    $('#form_atk_detali').submit(function(e) {
        e.preventDefault();

        let atk_id = $('#atk_id').val();
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();

        if (atk_id != "" || firstname != "" || lastname != "") {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../controller/admin/admin_search_request.php",
                data: {
                    atk_id: atk_id,
                    firstname: firstname,
                    lastname: lastname
                },
                success: function(search_atk) {

                    let tbody = ``;
                    let counter = 1;

                    search_atk.forEach(function(atk) {

                        tbody = `
                            <tr>
                                <td>
                                    <div class="form-check text-center">
                                        <input class="form-check-input" type="checkbox"" value="${atk.atk_id}" style="margin-left:auto; margin-right:auto;"> 
                                    </div>
                                </td>
                                <td>${counter}</td>
                                <td>${atk.firstname}</td>
                                <td>${atk.lastname}</td> 
                                <td>${atk.location}</td> 
                                <td>${atk.date_atk_in}</td>
                                <td>${atk.date_atk_out}</td>
                                <td><img src="../../upload/auth/${atk.filename}" style="width: 55px; height: 55px; border-radius: 30%"></td>
                            </tr>
                        `;

                        $('#show_atk_search').append(tbody);
                        counter++;
                    });
                }
            });

        } else {

            Swal.fire(
                'ผิดพลาด',
                'กรุณากรอกข้อมูลที่ต้องการค้นหา!',
                'error'
            ).then(function() {
                window.location.reload();
            });
        }

    });

    $('#chk_delete').submit(function(e) {
        e.preventDefault();

        let atk_id = [];

        $('.form-check-input').each(function() {
            if ($(this).is(":checked")) {
                atk_id.push($(this).val());
            }
        });

        atk_id.toString();

        if (atk_id.length == 0) {

            Swal.fire(
                'คำเตือน',
                'กรุณาเลือกข้อมูลที่ต้องการลบ!',
                'warning'
            ).then(function() {
                window.location.reload();
            });

        } else {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../controller/admin/admin_request_delete.php",
                data: {
                    atk_id: atk_id
                },
                success: function(response) {

                    if (response.status == 200) {

                        Swal.fire(
                            'สำเร็จ',
                            'ลบข้อมูลสำเร็จ',
                            'success'
                        ).then(function() {
                            window.location.reload();
                        });

                    } else {

                        Swal.fire(
                            'ผิดพลาด',
                            'กรุณาลองใหม่!',
                            'error'
                        ).then(function() {
                            window.location.reload();
                        });

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });

    $('#reset_page').click(function(e) {
        e.preventDefault();
        window.location.reload();
    });

});

function loadUsers() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../controller/admin/admin_loadUsers.php",
        data: "data",
        success: function(response) {

            let tbody = ``;
            let counter = 1;

            response.forEach(function(load) {
                tbody = `
                <tr>
                    <td>${counter}</td>
                    <td>${load.username}</td>
                    <td>${load.password}</td>
                    <td>${load.firstname}</td>
                    <td>${load.lastname}</td>
                    <td>${load.gender}</td>
                    <td>${load.phone}</td>
                    <td>${load.email}</td>
                    <td>${load.regis_date}</td>
                </tr>
            `;

                $('#show_all_users').append(tbody);
                counter++;

            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function loadATK() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../controller/admin/admin_loadATK.php",
        data: "data",
        success: function(response) {

            let tbody = ``;
            let counter = 1;

            response.forEach(function(load) {

                tbody = `
                <tr>
                    <td>${counter}</td>
                    <td>${load.atk_id}</td>
                    <td>${load.user_id}</td>
                    <td>${load.firstname}</td>
                    <td>${load.lastname}</td>
                    <td>${load.phone}</td>
                    <td>${load.location}</td>
                    <td>${load.date_atk_in}</td>
                    <td>${load.date_atk_out}</td>
                    <td>${load.form_date}</td>
                    <td><img src="../../upload/auth/${load.filename}" style="width: 55px; height: 55px; border-radius: 30%"></td>
                </tr>
            `;

                $('#show_all_atk').append(tbody);
                counter++;

            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function logout() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../controller/admin/admin_logout_request.php",
        data: {
            admin_id: window.localStorage.getItem("admin_id")
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
                        window.location.href = "../../view/admin/admin_login_view.php";
                    });

                }, 1000);
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}