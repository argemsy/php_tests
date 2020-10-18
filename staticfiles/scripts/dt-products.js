boton = (titulo,funcion,id,color="default",accion="Detalle") =>{ 
    return `<a 
                class="btn btn-${color} btn-sm" 
                href="javascript:void(0)"
                onclick="${funcion}(${id})"
                title="${titulo}">${accion}
            </a>&nbsp;`
};

var user_id = null;

callbackTable = () => {
    var url = 'product-api/list/';

    axios.get(url).then((response)=>{

        if(response.status == 200)
        {
            // Carga del usuario del sistema que se encuentra logueado
            user_id = response.data.user_id;


            // carga de la información proveniente de la bd pára el datatable
            var $data = response.data.datatable;
            var data = $data.aaData;
            for(i=0;i<data.length;i++)
            {
                data[i]['botones'] = null;
            }

            $data.language = dt_language('Productos');

            $data.columnDefs = [
                {
                    orderbale:false,
                    searchable:false,
                    targets:[5],
                    render: function(data, type, full) {

                        var $content = boton(`Detalle del producto ${full['name']}`,'detailProduct',full['id'])
                        $content += boton(`Edición de ${full['name']}`,'loadModalEdit',full['id'],'info','Editar')
                        $content += boton(`Eliminación de ${full['name']}`,'deleteProduct',full['id'],'danger','Eliminar')

                        return $content;
                      }
                }
            ];

            $("#table").DataTable($data)
        }

    })
    .catch((error)=>{

        console.log(error)

    })
} 

loadModal = () => {
    var product = new ClassJs('success');
    var content = product.input('Nombre','name')
    content += product.input('Descripción','description')
    content += product.selectInput('Categoria','category');
    var body = product.modalBody('Nuevo Producto','Salvar',content,'createProduct')

    $("#modalBody").empty().append(body).modal({show:true})
    product.select2Request('category-api/list-ac','category','Categorias')
}

createProduct = (id) => {
    var data = {
        name:$("#name").val(),
        description:$("#description").val(),
        category:$("#category").val(),
        username:user_id
    }
    
    axios.post('product-api/create',data).then((response)=>{
        if(response.status==200)
        {
            callbackTable();
            $("#modalBody").modal('toggle');
            swal(response.data.msj);
        }
    })
    .catch((error)=>{
        console.log(error);
    })

}

detailProduct = (id) =>{
    if(id==0 || id == '0'){
        $("#modalBody").modal('toggle')
    }else{
        var url = `product-api/retrieve/${id}`;
        axios.get(url).then((response)=>{
            if(response.status == 200)
            {
                $data = response.data;

                var product = new ClassJs('default');
                var content = product.input('Nombre','name','text',$data.name);
                content += product.input('Descripción','description','text',$data.description);
                content += product.input('Categoria','category','text',$data.category_);
                content += product.input('Usuario','username','text',$data.username);
                var title = `Detalle de ${$data.name}`;
                $("#modalBody").empty().append(product.modalBody(title,'Detalle',content,'detailProduct')).modal({show:true});
            }
        })
        .catch((error)=>{
            console.log(error)
        })
    }
}

loadModalEdit = (id) =>{
    var url = `product-api/retrieve/${id}`;
        axios.get(url).then((response)=>{
            if(response.status == 200)
            {
                $data = response.data;
                console.log($data)

                Diccionario = {
                    'Hombre':1,
                    'Mujer':2
                }

                var product = new ClassJs('info');
                var content = product.input('Nombre','name','text',$data.name);
                content += product.input('Descripción','description','text',$data.description);
                content += product.selectInput('Categoria','category');
                var title = `Editar datos del producto: ${$data.name}`;
                $("#modalBody").empty().append(product.modalBody(title,'Editar',content,'editProduct',$data.id)).modal({show:true});
                product.select2Request('category-api/list-ac','category','Categorias',true,$data.category_id)
            }
        })
        .catch((error)=>{
            console.log(error)
        })
}

editProduct = (id) =>{
    var data = {
        name:$("#name").val(),
        description:$("#description").val(),
        category:$("#category").val(),
        username:user_id,
    }
    var url = `product-api/put/${id}`;
    axios.post(url,data).then((response)=>{
        if(response.status==200)
        {
            callbackTable();
            $("#modalBody").modal('toggle');
            swal('Excelente','Producto editado satisfactoriamente','success');
        }
    })
    .catch((error)=>{
        console.log(error);
    })
}

deleteProduct = (id) =>{
    var data = {
        id:id
    }
    var url = `product-api/delete/${id}`;


    swal({
        title: "¿Está seguro?",
        text: "Eliminar el producto no se puede revertir",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

            axios.post(url,data).then((response)=>{
                if(response.status==200)
                {
                    callbackTable();
                    $("#modalBody").modal('toggle');
                }
            })
            .catch((error)=>{
                console.log(error);
            })

          swal('Exito',"Producto Eliminado","success");
        } else {
          swal("Buena elección","Producto no eliminado!","info");
        }
      });

}

$(document).ready(function(){


    callbackTable();

})