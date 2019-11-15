function verify_data(mode = null) {
    var params = $("#JoinForm").serialize();
    var verified = false;
    $.ajax({
        url: 'core/verify_data?mode=ajax',
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            // console.log(response[0]);
            // $('#verify_user_id').html(response[0].user_id.outMsg);
            // $('#verify_nickname').html(response[0].nickname.outMsg);
            // verified = response[0].user_id.verified && response[0].nickname.verified;

            // console.log(response);
            $('#verify_user_id').html(response.user_id.outMsg);
            $('#verify_nickname').html(response.nickname.outMsg);
            verified = response.user_id.verified && response.nickname.verified;
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