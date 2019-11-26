function verify_mypage(mode = null) {
    var params = $("#mypageForm").serialize();
    var verified = false;
    var requestURI = null;
    if (mode === "submit") {
        $('#btn-update').attr('disabled', 'disabled');
        requestURI = "core/verify_data?mode=join&type=ajax&db_check=true";
        $('#verify_nickname').html("<span class='text-warning'>닉네임 중복 검사 중 ...</span>");
    }
    else {
        $('#btn-update').removeAttr('disabled');
        requestURI = "core/verify_data?mode=join&type=ajax";
    }
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

            // console.log(response);
            $('#verify_user_id').html(response.user_id.outMsg);
            $('#verify_nickname').html(response.nickname.outMsg);
            $('#verify_password').html(response.pass.outMsg);
            $('#verify_password_confirm').html(response.pass_confirm.outMsg);
            $('#verify_email').html(response.email.outMsg);
            verified =
                response.user_id.verified &&
                response.nickname.verified &&
                response.pass.verified &&
                // response.pass_confirm.verified &&
                response.email.verified;
            if (verified && mode === "submit") {
                $('#mypageForm').submit();
            }
        },
        error: function (jqXHR) {
            alert("Ajax 오류가 발생했습니다. (Error Code: " + jqXHR.status + ")");
        }
    });
}

function cancel_user() {
    var params = $("#mypageForm").serialize();
    $('#btn-cancel').attr('disabled', 'disabled');

    $.ajax({
        url: "mypage?mode=cancel",
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                alert('회원탈퇴가 완료되었습니다.');
            }
            else {
                alert('작업 처리 중 오류가 발생했습니다.');
            }

            window.location.href = '/';
        },
        error: function (jqXHR) {
            alert("Ajax 오류가 발생했습니다. (Error Code: " + jqXHR.status + ")");
            window.location.href = '/';
        }
    });
}

// $('#username').change(verify_mypage);
$('#nick').change(verify_mypage);
$('#password').change(verify_mypage);
$('#password_confirm').change(verify_mypage);
$('#email').change(verify_mypage);
