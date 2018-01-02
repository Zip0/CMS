$(document).ready(function () {

    $(document).on('click', '.delete', function (event) {
        var result = confirm("Are you sure you want to delete?");
        if (!result) {
            return false;
        }
        var id = jQuery(this).attr("id");
//        alert(id);
        $.ajax({
            type: 'get',
            url: '?controller=posts&action=delete&id=' + id,
            success: function () {
                $("#listContainer").load("views/posts/list.php");
                $("#header").load("views/header.php");
            },
            error: function (result) {
                console.log(JSON.stringify(result));
            }
        });
    });

    $('.openBtn').on('click', function () {
//        alert('modal');
        $('.modal-content').load('../views/edit.php', function () {
            $('#editCategoryModal').modal({show: true});
        });
    });

    $('#listContainer').ready(function () {
        $.ajax({
            type: 'get',
            success: function () {
//                alert('success');
//                $("#listContainer").load("views/posts/list.php");
                $("#header").load("views/header.php");
            },
            error: function (result) {
                console.log(JSON.stringify(result));
            }
        });
    });

//    $(document).on('click', '#addCategoryButton', function () {
//        alert('trigg');

//        $.post('index.php', {field1: "selectedCategoryParent", field2: "selectedCategoryName", field3: "selectedCategoryActive"},
//                function (returnedData) {
//                    alert(post);
//                    console.log(returnedData);
//                });
//////        var result = confirm("Are you sure you want to delete?");
//////        if (!result) {
//////            return false;
//////        }
//////        var id = jQuery(this).attr("id");
//////        alert(id);
//        $.ajax({
//            type: 'post',
////            dataType: 'json',
////            url: '?controller=posts&action=addCategory',
//            success: function () {
//                alert('succ');
//                $("#listContainer").load("views/posts/list.php");
////                $("#header").load("views/header.php");
//            },
//            error: function (result) {
////                console.log(result);
//            }
//        });
//    });

//    $(document).ajaxStop(function () {

    $(document).on('click', ('input[name="selectedCategoryActive"]'), function () {
        var id = (event.target.id);
        $.ajax({
            type: 'post',
            url: '?controller=posts&action=toggleActive&id=' + id,
            success: function () {
                $("#header").load("views/header.php");
//                $('input[name="selectedCategoryActive"]').load($('input[name="selectedCategoryActive"]'))
            },
            error: function (result) {
                console.log(JSON.stringify(result));
            }
        });
    });

});
//});
function validateForm() {
    var x = document.forms["addCategory"]["selectedCategoryName"]["updateCategory"].value;
    if (x === "") {
        alert("Name must be filled out");
        return false;
    }
}