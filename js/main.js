/**
 * Created by BenTfu on 2017/11/24.
 */

(function () {
    var x = document.createElement("ins");
    var a = document.createElement("a");
    a.setAttribute("href","https://tb.53kf.com/code/client/10128903/1");
    a.setAttribute("target","_blank");
    x.setAttribute("class",'hot');
    x.appendChild(a);
    document.body.appendChild(x);
})();

$(document).ready(function () {
    $('#submit').click(function () {
        var username = $('#username').val();
        var phone = $('#phone').val();
        var sex = $('input:radio[name = "sex1"]:checked').val();
        if (username.length == "") {
            alert("用户名不能为空！");
            $('#username').focus();
        }else if(phone.length == "") {
            alert('手机号不能为空！');
            $('#phone').focus();
        }else if (!phone.match(/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/)) {
            alert("手机号码格式不正确！");
            $("#phone").focus();
        }else {
            $.post('userinfo_insert.php',{xingming:username,myphone:phone,sex1:sex},function(data) {
                if(data=='registerSuccess'){
                    alert('恭喜您,注册成功！');
                }else{
                    $("#username").val("");
                    $("#phone").val("");
                    alert('提交成功！稍后会有专业老师联系您！');
                }
            });
        }
    })
});
