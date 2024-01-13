
    $(document).ready(function(){

        //call function show all product
        affiche();
       $("#recherche").on('keyup',function(){
           affiche($.trim($(this).val()));
        });
       
         //function show all product
       function affiche(para=""){
           $("#mydata").DataTable().clear();
           $.ajax({
               async:true,
               url:'service/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){

                   var i;
                   for(i=0; i<data.length; i++){
                      
                    $('#mydata').dataTable().fnAddData([

                               "SE"+data[i].NUM_SERV,
                               data[i].DEPARTEMENT,
                               data[i].RESP,
                                '<a type="button" id="bleu" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_SERV+'"  data-dep="'+data[i].DEPARTEMENT+'"  data-resp="'+data[i].RESP+'" ></a>'+' '+
                                '<a type="button" id="rouge" class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_SERV+'"></a>',
                            ]);
                            }
                                     
                        },
                    });
        }
   
       function accepteApostrophe(ch) {
           ch = ch.replace(/\\/g,"\\\\")
           ch = ch.replace(/\'/g,"\\'")
           ch = ch.replace(/\"/g,"\\\"")
           return ch
           }
       
       //Save product
       $('#btn_save').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var DEPARTEMENT = $.trim($('#DEPARTEMENT').val());
           var RESP = $.trim($('#RESP').val());
           var DEPARTEMENT=accepteApostrophe(DEPARTEMENT);
           var RESP=accepteApostrophe(RESP);
          
           if(DEPARTEMENT=="")
           {
                $("#dep").html(texte);
                return false;
           }

           else if(DEPARTEMENT!="")
           {
                $("#dep").html("");
           }

           if(RESP!="")
           {
                $("#resp").html("");
           }

           if(RESP=="")
           {
                $("#resp").html(texte);
                return false;
           }
          
           else{

           $.ajax({
               type : "POST",
               url  : 'service/save/',
              
               data : {DEPARTEMENT:DEPARTEMENT,RESP:RESP},
               success: function(){
                   $('[name="DEPARTEMENT"]').val("");
                   $('[name="RESP"]').val("");
                   $('#Modal_Add').modal('hide');
                    
                    swal({
                        icon: 'success',
                        title: 'Ajout avec succès!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    affiche();
                    var oTable = $("#mydata").dataTable();
                    oTable.fnDraw();
               },
               error: function(){
                   alert('erreur');}
           });
           return false;
           }
       });

       //get data for update record
       $(document).on('click','.btn-edit',function(){
           const id = $(this).data('id');
           const dep = $(this).data('dep');
           const resp = $(this).data('resp');
          
           $('.NUM_SERV').val(id);
           $('.DEPARTEMENT').val(dep);
           $('.RESP').val(resp);
         
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_SERV = $.trim($('.NUM_SERV').val());
           var DEPARTEMENT = $.trim($('.DEPARTEMENT').val());
           var RESP = $.trim($('.RESP').val());
           var DEPARTEMENT=accepteApostrophe(DEPARTEMENT);
           var RESP=accepteApostrophe(RESP);
           
            if(DEPARTEMENT=="")
            {
                $("#dep1").html(texte);
                return false;
            }

            else if(DEPARTEMENT!="")
            {
                $("#dep1").html("");
            }

            if(RESP!="")
            {
                $("#resp1").html("");
            }

            if(RESP=="")
            {
                $("#resp1").html(texte);
                return false;
            }
          
           else{
           $.ajax({
               type : "POST",
               url  : 'service/update/',
               data : {NUM_SERV:NUM_SERV, DEPARTEMENT:DEPARTEMENT, RESP:RESP},
               success: function(){
                   $('[name="DEPARTEMENT"]').val("");
                   $('[name="RESP"]').val("");
                   
                   $('#Modal_Edit').modal('hide');
                   swal({      
                    icon: 'success',
                    title: 'Modification avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  affiche(); 
                  var oTable = $("#mydata").dataTable();
                  oTable.fnDraw();
               },
               error: function(){
                   alert('erreur');}
           });
           return false;
        }
       });

       $(document).on('click','.btn-delete',function(){
        // get data from button edit
        var id = $(this).attr('data-id');

        // Set data to Form Edit
        $('#NUM_SERV').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_SERV = $('#NUM_SERV').val();
        $.ajax({
            type : "POST",
            url  : 'service/delete/',
            data : {NUM_SERV:NUM_SERV},
            success: function(){
                $('#deleteModal').modal('hide');
                swal({ 
                    icon: 'success',
                    title: 'Suppression avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  affiche();
                  var oTable = $("#mydata").dataTable();
                  oTable.fnDraw();
            }
        });
        return false;
    });
});

