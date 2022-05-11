$(document).ready(function() {
  //
  $("#auth-register").submit(function(e) {
      e.preventDefault();
      //
      let username = $("#username").val().trim();
      let password = $("#password").val().trim();
      let firstname = $("#firstname").val().trim();
      let lastname = $("#lastname").val().trim();
      let phone = $("#phone").val().trim();
      let email = $("#email").val().trim();
      let gender = $("#gender").val().trim();
      //
      if (
          username != "" &&
          password != "" &&
          firstname != "" &&
          lastname != "" &&
          phone != "" &&
          email != "" &&
          gender != ""
      ) {
          //
          $.ajax({
              type: "POST",
              url: "../../controller/auth/auth_register_request.php",
              data: {
                  username: username,
                  password: password,
                  firstname: firstname,
                  lastname: lastname,
                  gender: gender,
                  phone: phone,
                  email: email,
              },
              dataType: "json",
              success: function(response) {
                  console.log(response);
                  if (response.status == 200) {

                      Swal.fire(
                          'สำเร็จ',
                          'ลงทะเบียนสำเร็จ',
                          'success'
                      ).then(function() {
                          window.location.href = "../../view/auth/user_login_view.php";
                      });

                  } else {

                      Swal.fire(
                          'ผิดพลาด',
                          'ลงทะเบียนไม่สำเร็จ',
                          'error'
                      ).then(function() {
                          window.location.href = "../../view/auth/user_register_view.php";
                      });
                  }
              },
              error: function(error) {
                  console.log(error);
              },
          });
      } else {

          Swal.fire(
              'คำเตือน',
              'กรุณากรอกข้อมูลให้ครบ',
              'warning'
          ).then(function() {
              window.location.href = "../../view/auth/user_register_view.php";
          });
      }
  });
  //
});