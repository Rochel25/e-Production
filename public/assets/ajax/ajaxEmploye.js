
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
               url:'employe/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                   
                   var i;
                   for(i=0; i<data.length; i++){

                    $('#mydata').dataTable().fnAddData([

                               "EM"+data[i].NUM_EMP,
                               data[i].NOM,
                               data[i].DEPARTEMENT,
                               data[i].TEL,
                               '<a type="button" id="bleu"  class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_EMP+'" data-id1="'+data[i].NUM_SERV+'"  data-nom="'+data[i].NOM+'"  data-tel="'+data[i].TEL+'" ></a>'+' '+
                               '<a type="button" id="rouge"  class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_EMP+'"></a>',
                                
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
           var NUM_SERV = $.trim($('#NUM_SERV').val());
           var NOM = $.trim($('#NOM').val());
           var TEL = $.trim($('#TEL').val());
           var NOM=accepteApostrophe(NOM);

            if(NUM_SERV==""){
                $('#service').html("Veuillez selectionner un service");
                return false;
            }

            else if(NUM_SERV!=""){
                $('#service').html("");
            }

            if(NOM==""){
                $('#nom').html(texte);
                return false;
            }

            else if(NOM!=""){
                $('#nom').html("");
            }

            if(TEL == "")
            {
                $('#tel').html(texte);
               return false;
            }
            
            if(TEL != "")
            {
                $('#tel').html("");
            }
            
            if(!($.isNumeric(TEL)))
            {
                $('#tel').html('Ce champ ne doit contenir que des chiffres');
                return false;
            }

            if(TEL.length != 10)
            {
                $('#tel').html('Ce champ doit contenir 10 chiffres sans espacer');
               return false;
            }

          
           else{

           $.ajax({
               type : "POST",
               url  : 'employe/save/',
               data : {NUM_SERV:NUM_SERV,NOM:NOM,TEL:TEL},
               success: function(){
                   $('[name="NUM_SERV"]').val("");
                   $('[name="NOM"]').val("");
                   $('[name="TEL"]').val("");
                   $('#Modal_Add').modal('hide');
                    //$('#Modal_Add').modal('hide');
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
           const id1 = $(this).data('id1');
           const nom = $(this).data('nom');
           const tel = $(this).data('tel');
          
           $('.NUM_EMP').val(id);
           $('.NUM_SERV').val(id1);
           $('.NOM').val(nom);
           $('.TEL').val(tel);
           
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_EMP = $.trim($('.NUM_EMP').val());
           var NUM_SERV = $.trim($('.NUM_SERV').val());
           var NOM = $.trim($('.NOM').val());
           var TEL = $.trim($('.TEL').val());
           
            if(NOM==""){
                $('#nom1').html(texte);
                return false;
            }

            else if(NOM!=""){
                $('#nom1').html("");
            }

            if(TEL == "")
            {
                $('#tel1').html(texte);
                return false;
            }
        
            if(TEL != "")
            {
                $('#tel1').html("");
            }
        
            if(!($.isNumeric(TEL)))
            {
                $('#tel1').html('Ce champ ne doit contenir que des chiffres');
                return false;
            }

            if(TEL.length != 10)
            {
                $('#tel1').html('Ce champ doit contenir 10 chiffres sans espacer');
                return false;
            }

          
           else{
           $.ajax({
               type : "POST",
               url  : 'employe/update/',
              
               data : {NUM_EMP:NUM_EMP, NUM_SERV:NUM_SERV, NOM:NOM, TEL:TEL},
               success: function(){
                   $('[name="NUM_SERV"]').val("");
                   $('[name="NOM"]').val("");
                   $('[name="TEL"]').val("");
                   
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
        $('#NUM_EMP').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_EMP = $('#NUM_EMP').val();
        $.ajax({
            type : "POST",
            url  : 'employe/delete/',
            data : {NUM_EMP:NUM_EMP},
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

