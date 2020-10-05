callbackTable = () => {
    var url = 'db/';

    axios.get(url).then((response)=>{

        if(response.status == 200)
        {
            var $data = response.data;

            $("#table").DataTable({
                data:$data,
                destroy:true,
                responsive:true,

                columns:[
                    {data:'id'},
                    {data:'name',className:'text-primary'},
                    {data:'description'},
                    {data:'category_'},
                ]
            })

        }

    })
    .catch((error)=>{

        console.log(error)

    })
} 

$(document).ready(function(){


    callbackTable();
    

})