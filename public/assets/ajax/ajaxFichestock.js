$(document).ready(function(){

    $('#bg').on('click',function(){
     
        var PRO = $('#produit').val();
        var DATE = $('#date').val();

        $('#pro').val(PRO);
        $('#dat').val(DATE);

        $.ajax({
                async:true,
                url:'fichestock/affiche/'+PRO+"/"+DATE,
                type:'GET',
                dataType:'Json',
                success:function(data){
                  $("#mydata").DataTable().clear();
                   var i;
                   var stock='';
                
                   for(i=0; i<data.length; i++){
                    stock="STOCK ACTUEL : "+data[i].stock;
                    var PU=data[i].pu;
                    var MONTANT=data[i].montant;
                    if(data.length==0){
                     stock="";
                    }else{
                     stock=stock;
                    }
                    if(PU==0 || MONTANT==0 ){
                        PU="";
                        MONTANT="";
                    }
                    else{
                        PU=PU;
                        MONTANT=MONTANT;
                    }

                    $('#mydata').dataTable().fnAddData([

                    data[i].bon,
                    data[i].dat.split("-").reverse().join("/"),
                    data[i].QT_E,
                    PU,
                    MONTANT,
                    data[i].raison,
                    data[i].QT_S

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