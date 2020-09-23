

$.ajax({
    url:'/?accion=table-json',
    type:'json',
    method:'GET',
    success:function(r){
        $("#table").DataTable(r)
    }
})