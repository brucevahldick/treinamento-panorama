$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'ajax/login_user.php',
            data: $(this).serialize(),
            success: function (response) {
                var data = JSON.parse(response);
                alert(data.message);
                if (data.status == "success")
                    window.location.href = 'index.php';
            }
        });
    });
});