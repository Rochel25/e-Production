$(document).ready(function(){

    $('#bg').on('click',function(){
     
        var PRO = $('#produit').val();
        var DATE = $('#date').val();

        $('#pro').val(PRO);
        $('#dat').val(DATE);

        $.ajax({
                async:true,
                url:'emprunt/affiche/'+PRO+"/"+DATE,
                type:'GET',
                dataType:'Json',
                success:function(data){
                  $("#mydata").DataTable().clear();
                   var i;
                   var stock='';
                
                   for(i=0; i<data.length; i++){
                    stock="STOCK ACTUEL : "+data[i].stock;
                   
                    if(data.length==0){
                     stock="";
                    }else{
                     stock=stock;
                    }
                
                    $('#mydata').dataTable().fnAddData([

                    data[i].bon,
                    data[i].dat.split("-").reverse().join("/"),
                    data[i].nom,
                    data[i].QT_E,
                    data[i].obs,
                    data[i].QT_S,
                    data[i].raison,
    
                    ]);
                  
                   }
                  $('#stock').html(stock);
                  var oTable = $("#mydata").dataTable();
                  oTable.fnDraw();
               },
               error:function(){
                alert("erreur");
               }
        })
    });
})