<?php require_once("../../view/bootstrap/harder_template.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #BBBDF1;">
    <div class="container-fluid">
        <a class="navbar-brand">ระบบคัดกรองโควิด COVID-19</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/atk_project/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                        </svg> หน้าเเรก
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br><br><br><br>
<div class="container">
    <div class="col d-flex justify-content-center">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="width: 35rem;">
            <form id="auth-login">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">เข้าสู่ระบบ : admin</h5>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg></span>
                        <input type="text" class="form-control" id="admin_name" placeholder="Username" aria-label="admin_name" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg></span>
                        <input type="password" class="form-control" id="admin_pass" placeholder="Password" aria-label="admin_pass" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <br>
                <button class="btn-submit btn btn-primary mt-3" id="btn_login" type="submit" style="width: 100%;">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</div>

<?php require_once("../../view/bootstrap/footer_template.php"); ?>
<script src="../../javascript/admin/admin_login_view.js"></script>
