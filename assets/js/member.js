function verify_data() {
    var params = $("#JoinForm").serialize();
    $.ajax({
        url: 'ajax/verify_data.php',
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            console.log(response[0]);
            $('#verify_user_id').text(response[0].user_id.outMsg);
            $('#verify_nickname').text(response[0].nickname.outMsg);
        },
        error: function (jqXHR) {
            alert("Ajax 오류가 발생했습니다. (Error Code: " + jqXHR.status + ")");
        }
    });
}

$('#username').change(verify_data);
$('#nick').change(verify_data);