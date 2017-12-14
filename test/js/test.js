
$(document).ready(function () {

    $('.delete').click(function () {
        var result = confirm("DOOT DOOT U WANT DELOOT?");
        if (!result) {
            return false;
        }
    });

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
                    console.log(result);
                }
            });
        });

    });
//});
function validateForm() {
    var x = document.forms["addCategory"]["selectedCategoryName"].value;
    if (x === "") {
        alert("Name must be filled out");
        return false;
    }
}