

chargeTemplate = () =>{

    var login = new ClassJs('primary');

    var $content = login.input('Usuario','username','text');
    $content += login.input('Password','password','password');
    $content += login.Btn('Ingresar','btn_login');

    $("form").empty().append($content);

}



$("#btn_login").on('click',function(e){
    e.preventDefault();

    var $username = $("#username").val();
    alert($username);

})

$(document).ready(function(){

    chargeTemplate();

})