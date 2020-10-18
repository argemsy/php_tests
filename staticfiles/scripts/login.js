

chargeTemplate = () =>{

    var login = new ClassJs('primary');

    var $content = login.input('Usuario','username','text');
    $content += login.input('Password','password','password');
    $content += login.Btn('Ingresar','btn_login');

    $("#formulario").empty().append($content);

}


login = () => {

    axios.post('/login/',{}).then((response)=>{
        if(response.status == 200)
        {
            setTimeout(function(){
                location.href = "/blog"
            })
        }
    })

}


$("#btn_login").on('click',function(e){
    e.preventDefault();

    var $username = $("#username").val();
    console.log($username);
    alert($username);

})

$(document).ready(function(){

    chargeTemplate();

})
