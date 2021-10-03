
$(document).ready(function() {
    showTable();
    $('#add').click(function() {
        $('#addNewUser').modal('show');
        $('#addForm')[0].reset();
    });


    /* Show User */
    function showTable() {
        $.ajax({
            type: 'POST',
            url: 'user-table.php',
            data: {
                table: 1
            },
            success: function(data) {
                $('#table').html(data);
            }
        });
    }
    /* End Show User */

    /*  Add user */
    $(document).ready(function(e) {
        $("#addForm").on('submit', function(e) {
            e.preventDefault();
            var userName = $('#userName').val();
            var cPass = $('#cPass').val();
            var fullName = $('#fullName').val();
            var birthDate = $('#birthDate').val();

            if (userName != '' && cPass != '' && fullName != '' && birthDate != '') {
                dataArr = new FormData(this)
                $.ajax({
                    url: "add.php",
                    type: "POST",
                    data: dataArr,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function() {
                        $('#addNewUser').modal('hide');
                        $('#addForm')[0].reset();
                        showTable();
                        $('#alert').slideDown();
                        $('#alertText').text('User Added Successfully');
                    }

                });
            } else {
                alert('Please check again');
            }
        });
    });
    /*End  Add user */


    /*  Delete user */
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var idUser = $(this).data('id');
        console.log(idUser);
        var idName = $('#name' + idUser).text();
        $('#deleteModal').modal('show');
        $('#dName').text(idName);
        $('#idUserHidden').val(idUser);
    });

    $("#deleteForm").on('submit', function(e) {
        e.preventDefault();
        var idUser = $('#idUserHidden').val();
        if (idUser != '') {
            $.ajax({
                type: 'POST',
                url: 'delete.php',
                data: {
                    idUser: idUser,
                },
                success: function() {
                    $('#deleteModal').modal('hide');
                    showTable();
                    $('#alert').slideDown();
                    $('#alertText').text('Delete Successfully');
                }
            });
        }

    });
    /*End  Delete user */

    /*  Edit user */
    $(document).on('click', '.btn-edit', function() {
        var idUser = $(this).data('id');
        var editUserName = $('#name' + idUser).text();
        var editFullName = $('#full' + idUser).text();
        var editBirthDate = $('#day' + idUser).text();
        $('#editModal').modal('show');
        $('#editUserName').val(editUserName);
        $('#editFullName').val(editFullName);
        $('#editBirthDate').val(editBirthDate);
        $('#idEditHidden').val(idUser);
    });
    $("#editForm").on('submit', function(e) {
        e.preventDefault();
        var idUser = $('#idEditHidden').val();
        var editUserName = $('#editUserName').val();
        var editFullName = $('#editFullName').val();
        var editBirthDate = $('#editBirthDate').val();
        if (editUserName != '' && editUserName != '' && editFullName != '' && editBirthDate != '') {
            dataArr = new FormData(this);
            console.log(idUser, editUserName, editFullName, editBirthDate);
            $.ajax({
                url: "update.php",
                type: "POST",
                data: dataArr,
                contentType: false,
                cache: false,
                processData: false,
                success: function() {
                    $('#editModal').modal('hide');
                    $('#addForm')[0].reset();
                    showTable();
                    $('#alert').slideDown();
                    $('#alertText').text('Update Successfully');
                }

            });
        } else {
            alert('Please input both Fields');
        }

    });

    /* End  Edit user */
    $(function() {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
    });

    /* View user */
    $(document).on('click', '.btn-view', function() {
        var idUser = $(this).data('id');
        var viewUserName = $('#name' + idUser).text();
        var viewFullName = $('#full' + idUser).text();
        var viewBirthDate = $('#day' + idUser).text();
        var viewImgUser = $('#img' + idUser).text();
        $('#viewModal').modal('show');
        $('#viewUserName').val(viewUserName);
        $('#viewFullName').val(viewFullName);
        $('#viewBirthDate').val(viewBirthDate);
        $('#viewImgUser').val(viewImgUser);
        $("#viewImgUser").attr("src", './' + viewImgUser);
    });

});
