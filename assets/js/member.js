function verify_data(mode = null) {
    var params = $("#JoinForm").serialize();
    var verified = false;
    var requestURI = null;
    (mode === "submit") ? requestURI = "core/verify_data" : requestURI = "core/verify_data?mode=ajax";
    $.ajax({
        url: requestURI,
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            // console.log(response[0]);
            // $('#verify_user_id').html(response[0].user_id.outMsg);
            // $('#verify_nickname').html(response[0].nickname.outMsg);
            // verified = response[0].user_id.verified && response[0].nickname.verified;

            console.log(response);
            $('#verify_user_id').html(response.user_id.outMsg);
            $('#verify_nickname').html(response.nickname.outMsg);
            $('#verify_password').html(response.pass.outMsg);
            $('#verify_password_confirm').html(response.pass_confirm.outMsg);
            $('#verify_email').html(response.email.outMsg);
            verified =
                response.user_id.verified &&
                response.nickname.verified &&
                response.pass.verified &&
                response.pass_confirm.verified &&
                response.email.verified;
            if (verified && mode === "submit") {
                $('#JoinForm').submit();
            }
        },
        error: function (jqXHR) {
            alert("Ajax 오류가 발생했습니다. (Error Code: " + jqXHR.status + ")");
        }
    });
}

$('#username').change(verify_data);
$('#nick').change(verify_data);
$('#password').change(verify_data);
$('#password_confirm').change(verify_data);
$('#email').change(verify_data);
