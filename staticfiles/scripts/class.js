var ClassJs = function(color='primary'){

    this.color = color;
    this.modalId = "#modalBody";

    this.input = (label,idInput,type='text',value=null) =>{
        return(`<div class="row form-group">
                    <div class="col-md-4">
                        <label for="${idInput}">${label}</label>
                    </div>
                    <div class="col-md-8">
                        <input 
                            class="form-control" 
                            type="${type}" 
                            name="${idInput}" 
                            id="${idInput}" 
                            placeholder="${label}"
                            value="${value?value:""}">
                        <span id="${idInput}_error" class="text-danger"></span>
                    </div>
                </div>`);
    }

    this.Btn = (label,idBtn) =>{

        return(`<div class="row">
                    <div class="col-sm-offset-4 col-sm-4">
                        <p>
                            <button class="btn btn-${this.color} btn-sm form-control" id="${idBtn}">
                                ${label}
                            </button>
                        </p>
                    </div>
                </div>`);

    }

    this.selectInput = (label,idInput) => {
        return (`<div class="row form-group">
                    <div class="col-md-4">
                        <label for="${idInput}">${label}</label>
                    </div>
                    <div class="col-md-8">
                        <select 
                            name="${idInput}" 
                            id="${idInput}" 
                            class="form-control form-control-sm select2"
                            style="width:100%">
                                <option value="">${label}</option>
                        </select>
                        <span id="${idInput}_error" class="text-danger"></span>
                    </div>
                </div>
        
        `);
    }

    this.modalBody = (titulo,accion='Detalle',content,funcion,param=0) => {
        return (`<div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">${titulo}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ${content}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-${this.color}" onclick="${funcion}(${param});">${accion}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>`);
    }

    this.select2Request = (url,idInput,placeholder,selected=false,value=null) => {

        axios.get(url).then((response)=>{
            if(response.status == 200)
            {
                $(`#${idInput}`).select2({
                    width:'100%',
                    minimumInputLength:1,
                    allowClear: true,
                    placeholder:placeholder,
                    data:response.data
                })

                if (selected){
                    $(`#${idInput}`).val(value).trigger('change')
                }

            }
        })
        .catch((error)=>{
            console.log(error)
        })

    }



}


// ESTO SE APLICA A TODOS LOS HTML QUE TENGAN UN DIV CON UN ID REDIRECT
redirectLink = (path='/',label="Menú principal") => {
    return (`<a href="${path}" title="${label}">${label}</a>`);
}

$("#redirect").empty().append(redirectLink());

dt_language =(palabraClave='registros')=>{
    return {
      sLengthMenu:     `Mostrar _MENU_ ${palabraClave}`,
      sZeroRecords:    `No se encontraron resultados`,
      sEmptyTable:     `Ningún dato disponible en esta tabla`,
      sInfo:           `Mostrando ${palabraClave} del _START_ al _END_ de un total de _TOTAL_ ${palabraClave}`,
      sInfoEmpty:      `Mostrando ${palabraClave} del 0 al 0 de un total de 0 ${palabraClave}`,
      sInfoFiltered:   `(filtrado de un total de _MAX_ ${palabraClave})`,
      sInfoPostFix:    "",
      sSearch:         `Buscar:`,
      sUrl:            "",
      sInfoThousands:  ",",
      sLoadingRecords: `Cargando...`,
      sProcessing: `Cargando...`,
      oPaginate: {
        sFirst:    "Primero",
        sLast:     "Último",
        sNext:     "Siguiente",
        sPrevious: "Anterior"
      },

      oAria: {
        sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente"
      }
    };
} 