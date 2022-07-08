document.getElementById("login-btn").addEventListener("click", function() {
    $.ajax({
        method: "POST",
        url: "system/Login.php",
        data: {
            user: "matheus.power.ma@gmail.com",
            pass: "asdasdasd"
        }
    }).done(function(response) {
        let responseJson = JSON.parse(response);
        if(responseJson.status == "success") {
            $.post('system/session_write.php', { session_name: 'mySessionID', session_value: responseJson.sessionID });
            $.post('system/session_write.php', { session_name: 'local_user', session_value: responseJson.user });
            alert("success");
        } else {
            alert(response);
        }
    });
})