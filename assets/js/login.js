function verify_login(mode = null) {
    var params = $("#loginForm").serialize();
    var verified = false;

    $.ajax({
        url: "core/verify_data?mode=login&type=ajax",
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            $('#verify_user_id').html(response.user_id.outMsg);
            $('#verify_password').html(response.pass.outMsg);
            verified =
                response.user_id.verified &&
                response.pass.verified;
            if (verified && mode === "submit") {
                $('#loginForm').submit();
            }
        },
        error: function (jqXHR) {
            alert("Ajax 오류가 발생했습니다. (Error Code: " + jqXHR.status + ")");
        }
    });
}

$('#username').change(verify_login);
$('#password').change(verify_login);
