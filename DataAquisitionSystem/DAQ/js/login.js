$("#login_form").submit(function (e)
{
    e.preventDefault();
    var obj = $(this), action = obj.attr('name');
    $.ajax({
        type: "POST",
        url: e.target.action,
        data: obj.serialize()+"&Action="+action,
        cache: false,
        success: function (JSON) {
            if (JSON.error != '') {
				swal({
				  title: 'Error!',
				  text: JSON.error,
				  type: 'error',
				  confirmButtonText: 'Cool'
				});
            } else {
				 $("body").fadeOut(1000,function(){window.location.href = "index.php"});
            }
        }
    });
});

$(document).ready(function(){

$("#"+action+" #display_error").hide();
});
