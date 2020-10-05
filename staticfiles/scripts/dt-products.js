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
                order:[[0,'desc']],
                columns:[
                    {data:'id',className:'text-center'},
                    {data:'name',className:'text-success'},
                    {data:'description'},
                    {data:'category_',className:'text-center'},
                    {data:'username',className:'text-primary text-center'},
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