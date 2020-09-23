var ClassJs = function(color='primary'){

    this.color = color;

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


}