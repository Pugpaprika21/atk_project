$("#auth-login").submit(function(e) {
  e.preventDefault();

  let username = $("#username").val().trim();
  let password = $("#password").val().trim();


  if (username != "" && password != "") {

      $.ajax({
          type: "post",
          url: "../../controller/auth/auth_login_request.php",
          data: {
              username: username,
              password: password
          },
          dataType: "json",
          success: function(response) {

              try {

                  let user_id = response[0].user_id;
                  let username = response[0].username;
                  let password = response[0].password;

                  localStorage.setItem("user_id", user_id);
                  localStorage.setItem("username", username);
                  localStorage.setItem("password", password);

                  if (response[0].username == username && response[0].password == password) {

                      Swal.fire(
                          'สำเร็จ',
                          'ล็อคอินสำเร็จ',
                          'success'
                      ).then(function() {
                          window.location = "../../view/auth/user_page_view.php";
                      });

                  }

              } catch (err) {
                  //console.log(err.message);
                  Swal.fire({
                      icon: 'error',
                      title: 'ผิดพลาด',
                      text: 'Username หรือ Password ไม่ถูกต้อง!'
                  }).then(function() {
                      window.location.reload();
                  });
              }

          },
          error: function(error) {
              console.log(error);
          }
      });
  } else {

      Swal.fire({
          icon: 'warning',
          title: 'คำเตือน',
          text: 'กรอกข้อมูลให้ครบถ้วน'
      }).then(function() {
          window.location.reload();
      });
  }

});