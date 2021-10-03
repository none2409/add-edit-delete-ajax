<!DOCTYPE html>
<html lang="en">
<?php
include_once("dbclass.php");
$viewUser = new User();
$listUser = $viewUser->getAllData();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-light mb-3">
            <div class="container-fluid">
                <a href="#" class="navbar-brand mr-3">Thứ Quí</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Services</a>
                        <a href="#" class="nav-item nav-link">About</a>
                        <a href="#" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a href="#" class="nav-item nav-link">Register</a>
                        <a href="#" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row justify-content-end mb-4">
                    <button data-toggle="modal" id="add" class="btn btn-lg btn-primary float-right">Add New User</button>
                </div>
            </div>
            <div id="alert" class="text-center alert alert-success" style="display:none;">
                <span id="alertText"></span>
            </div>

            <!--  Modal Adding User -->
            <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new User</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="addForm" action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="userName">User name</label>
                                    <input type="text" class="form-control" name="userName" id="userName" aria-describedby="User name" placeholder="Nhập vào username">
                                </div>
                                <div class="form-group">
                                    <label for="cPass">Password</label>
                                    <input type="password" class="form-control" name="cPass" id="cPass" placeholder="******">
                                </div>
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" name="fullName" id="fullName" aria-describedby="Full name" placeholder="Nhập vào tên đầy đủ">
                                </div>
                                <div class="form-group">
                                    <label for="birthDate">Birth of day</label>
                                    <input class="datepicker     form-control" type="date" name="birthDate" id="birthDate" value="">
                                </div>
                                <div class=" form-group">
                                    <label for="avatar">Avatar</label>
                                    <input id="uploadImage" type="file" accept="image/*" name="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                                <input class="btn btn-success" type="submit" value="Thêm">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Adding User  -->
            <!--  Delete User Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="deleteForm" action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <h5>
                                        <input hidden id="idUserHidden" value="">
                                        <p>Are you sure delete: <strong><span id="dName"></span></strong> ?</p>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <button class="btn btn-success" id="btn-delete" type="submit">Delete</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--End Delete User Modal -->
        <!--  Modal View User -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="viewForm" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="viewUserName">User name</label>
                                <input type="text" class="form-control" name="viewUserName" id="viewUserName" aria-describedby="User name" placeholder="Nhập vào username" disabled>
                            </div>
                            <div class="form-group">
                                <label for="viewFullName">Full Name</label>
                                <input type="text" class="form-control" name="viewFullName" id="viewFullName" aria-describedby="Full name" placeholder="Nhập vào tên đầy đủ" disabled>
                            </div>
                            <div class="form-group">
                                <label for="viewBirthDate">Birth of day</label>
                                <input class="datepicker form-control" type="text" name="viewBirthDate" id="viewBirthDate" value="" disabled>
                            </div>
                            <div class=" form-group">
                                <img id="viewImgUser" alt="Image User" width="470px" height="400px">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Đóng">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal View User  -->

        <!--  Modal Edit User -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">View</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="editForm" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="editUserName">User name</label>
                                <input type="text" class="form-control" name="editUserName" id="editUserName" aria-describedby="User name" placeholder="Nhập vào username">
                            </div>
                            <div class="form-group">
                                <label for="editFullName">Full Name</label>
                                <input type="text" class="form-control" name="editFullName" id="editFullName" aria-describedby="Full name" placeholder="Nhập vào tên đầy đủ">
                            </div>
                            <div class="form-group">
                                <label for="editBirthDate">Birth of day</label>
                                <input class="datepicker form-control" type="text" name="editBirthDate" id="editBirthDate" value="">
                            </div>
                            <div class=" form-group">
                                <label for="avatar">Avatar</label>
                                <input id="editUploadImage" type="file" accept="image/*" name="editUploadImage">
                            </div>
                        </div>
                        <input hidden id="idEditHidden" name="idUser">
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                            <input class="btn btn-success" type="submit" id="btn-update" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Edit User  -->
    </div>
    <div class="row justify-content-center m-0">
        <div class="col-xs-12 col-md-12 col-lg-10 col-xl-8">
            <div id="table" class="table-responsive">
            </div>
        </div>

    </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>


</body>

</html>