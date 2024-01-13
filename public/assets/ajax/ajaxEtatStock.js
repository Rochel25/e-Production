$(document).ready(function(){

    $('#bg').on('click',function(){
     
        var PRO = $('#produit').val();
        $('#pro').val(PRO);
       
        $.ajax({
                async:true,
                url:'etatstock/stock/'+PRO,
                type:'GET',
                dataType:'Json',
                success:function(data){
                  $("#mydata").DataTable().clear();
                   var i;
                   for(i=0; i<data.length; i++){
                    
                    $('#mydata').dataTable().fnAddData([
                    data[i].design,
                    data[i].stock,
                    ]);
                  
                   }
                  var oTable = $("#mydata").dataTable();
                  oTable.fnDraw();
               },
               error:function(){
                alert("erreur");
               }
        })
    });
})