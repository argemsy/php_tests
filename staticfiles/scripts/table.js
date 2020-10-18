


callbackTable = () => {
    var url = 'table-json/';

    axios.get(url).then((response)=>{

        if(response.status == 200)
        {
            var $data = response.data;

            $("#table").DataTable($data)

        }

    })
    .catch((error)=>{

        console.log(error)

    })
} 

$(document).ready(function(){


    callbackTable();
    

})