$(document).ready(function(){

    $('#bg').on('click',function(){
     
        var PRO = $('#produit').val();
        var DATE = $('#date').val();

        $('#pro').val(PRO);
        $('#dat').val(DATE);

if(PRO!="Produit fini"){
    $.ajax({
        async:true,
        url:'etatfinancier/affiche1/'+PRO+"/"+DATE,
        type:'GET',
        dataType:'Json',
        success:function(data){
          $("#mydata").DataTable().clear();
           var i;
          var sum=0;
           
           for(i=0; i<data.length; i++){
            var montant=data[i].montant;
             sum +=parseFloat(montant);
            $('#mydata').dataTable().fnAddData([

           data[i].DESIGNATION,
           parseFloat(montant).toLocaleString()+"Ar",

            ]);
          
           }
           if(data.length==0){
            $('#flux').html("");
           }else{
            $('#flux').html("TOTAL DE FLUX : "+sum.toLocaleString()+"Ar");
           }
          
          var oTable = $("#mydata").dataTable();
          oTable.fnDraw();
       },
       error:function(){
        alert("erreur");
       }
})
}

if(PRO=="Produit fini"){
    $.ajax({
        async:true,
        url:'etatfinancier/affiche2/'+PRO+"/"+DATE,
        type:'GET',
        dataType:'Json',
        success:function(data){
          $("#mydata").DataTable().clear();
           var i;
           var sum=0;
        
           for(i=0; i<data.length; i++){
            var montant=data[i].montant;
            sum +=parseFloat(montant);
           
            $('#mydata').dataTable().fnAddData([

           data[i].DESIGNATION,
           parseFloat(montant).toLocaleString()+"Ar",

            ]);
          
           }
           if(data.length==0){
            $('#flux').html("");
           }else{
            $('#flux').html("TOTAL DE FLUX : "+sum.toLocaleString()+"Ar");
           }
          var oTable = $("#mydata").dataTable();
          oTable.fnDraw();
       },
       error:function(){
        alert("erreur");
       }
})
}
       
    });
})