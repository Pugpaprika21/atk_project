<?php require_once("../../view/bootstrap/harder_template.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #BBBDF1;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ระบบคัดกรองโควิด COVID-19</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="logout()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg> ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-6 col-md-2">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" aria-current="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg> เมนู
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg> ออกจากระบบ</a>
            </div>
        </div>
        <div class="col-6 col-md-10">
            <div class="card">
                <div class="card-body">
                    หน้าจัดการข้อมูลทั่วไป : Admin
                    <hr>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill mb-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg> สมาชิก</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-atk_detail-tab" data-bs-toggle="pill" data-bs-target="#pills-atk_detail" type="button" role="tab" aria-controls="pills-atk_detail" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search mb-1" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg> ค้นหาข้อมูล ATK</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-show_all_atk_users-tab" data-bs-toggle="pill" data-bs-target="#pills-show_all_atk" type="button" role="tab" aria-controls="pills-show_all_atk" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                                </svg> ข้อมูล ATK ทั้งหมด</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                            <table class="table text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <td>ลำดับ</td>
                                        <td>username</td>
                                        <td>password</td>
                                        <td>ชื่อ</td>
                                        <td>นามสกุล</td>
                                        <td>เพศ</td>
                                        <td>เบอร์</td>
                                        <td>อีเมล</td>
                                        <td>ลงทะเบียน</td>
                                    </tr>
                                </thead>
                                <tbody id="show_all_users">

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-atk_detail" role="tabpanel" aria-labelledby="pills-atk_detail-tab">
                            <form id="form_atk_detali">
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" id="atk_id" placeholder="รหัส ATK" aria-label="atk_id" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" id="firstname" placeholder="ชื่อ" aria-label="firstname" aria-describedby="basic-addon2">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" id="lastname" placeholder="นามสกุล" aria-label="lastname" aria-describedby="basic-addon3">
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 100%;">ค้นหา</button>
                                    </div>
                            </form>
                            <div class="col-6 col-md-9">
                                <table class="table text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <td>ลบ</td>
                                            <td>#</td>
                                        
                                            <td>ชื่อ</td>
                                            <td>นามสกุล</td>
                                            <td>สถานที่</td>
                                            <td>เข้า</td>
                                            <td>ออก</td>
                                            <td>ผลการตรวจ-ATK</td>
                                        </tr>
                                    </thead>
                                    <form id="chk_delete">
                                        <tbody id="show_atk_search">

                                        </tbody>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-warning mb-2" id="reset_page">ล้าง</button>
                                            <button type="submit" class="btn btn-danger mb-2">ลบ</button>
                                        </div>
                                    </form>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-show_all_atk" role="tabpanel" aria-labelledby="pills-show_all_atk_users-tab">
                        <table class="table text-center">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>รหัส atk</td>
                                    <td>รหัสสมาชิก</td>
                                    <td>ชื่อ</td>
                                    <td>นามสกุล</td>
                                    <td>เบอร์โทร</td>
                                    <td>สถานที่</td>
                                    <td>วันที่เข้า</td>
                                    <td>วันที่ออก</td>
                                    <td>บันทึกผล</td>
                                    <td>ผลตรวจ ATK</td>
                                </tr>
                            </thead>
                            <tbody id="show_all_atk">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require_once("../../view/bootstrap/footer_template.php"); ?>
<script src="../../javascript/admin/admin_page_view.js"></script>
