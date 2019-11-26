function verify_login(mode = null) {
    var params = $("#loginForm").serialize();
    var verified = false;

    $.ajax({
        url: "core/verify_data?mode=login&type=ajax",
        type: 'POST',
        data: params,
        dataType: 'json',
        success: function (response) {
            if (!response.user_id.verified) $('#verify_user_id').html(response.user_id.outMsg);
            if (!response.pass.verified) $('#verify_password').html(response.pass.outMsg);
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

const $password = $('#password');
// Keyboard events
$password.keydown(event => {
    // When the client hits ENTER on their keyboard
    if (event.which === 13) {
        verify_login('submit');
    }
});

var oldVal = ""; //global variable

function changeEvent() {
    var currentVal = $(this).val();
    if(currentVal === oldVal) {
        return;
    }

    oldVal = currentVal;
    verify_login();
}

$("#username").on("propertychange change keyup paste input", changeEvent);
$password.on("propertychange change keyup paste input", changeEvent);

// $('#username').change(verify_login);
// $password.change(verify_login);
