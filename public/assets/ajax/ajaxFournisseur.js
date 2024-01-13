
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
               url:'fournisseur/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                  
                   var i;
                   for(i=0; i<data.length; i++){

                    $('#mydata').dataTable().fnAddData([
                      
                               "FR"+data[i].NUM_F,
                               data[i].NOM,
                               data[i].ADRESSE,
                               data[i].TEL,
                            
                                '<a type="button" id="bleu" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_F+'"  data-nom="'+data[i].NOM+'" data-trans="'+data[i].TRANS+'" data-ad="'+data[i].ADRESSE+'" data-tel="'+data[i].TEL+'"></a>'+' '+
                                '<a type="button" id="rouge" class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_F+'"></a>'
                               
                              
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
           var NOM = $.trim($('#NOM').val());
           var ADRESSE = $.trim($('#ADRESSE').val());
           var TEL = $.trim($('#TEL').val());
           let TRANS = $.trim($('#TRANS').val());
           let NUM_SERV = $.trim($('#NUM_SERV').val());
           var ADRESSE=accepteApostrophe(ADRESSE);

            if(NOM==""){
                $('#fr').html(texte);
                return false;
            }

            else if(NOM!=""){
                $('#fr').html("");
            }

            if(TRANS==""){
                $('#type').html("Veuillez selectionner un type");
                return false;
            }

            else if(TRANS!=""){
                $('#type').html("");
            }

            if(TRANS=="0" && NUM_SERV==""){
                $('#service').html("Veuillez selectionner un service");
                $('#adresse').html("");
                return false;
            }

            else if(TRANS!="0" && NUM_SERV==""){
                $('#service').html("");
            }

            if(TRANS!="0" && ADRESSE!=""){
                $('#adresse').html("");
            }

            if(TRANS!="0" && ADRESSE==""){
                $('#adresse').html(texte);
                return false;
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
                $('#tel').html('Ce champ doit contenir 10 chiffres sans espace');
               return false;
            }

            
          else{

           $.ajax({
               type : "POST",
               url  : 'fournisseur/save/',
              
               data : {NOM:NOM,ADRESSE:ADRESSE,TEL:TEL,TRANS:TRANS,NUM_SERV:NUM_SERV},
               success: function(){
                   $('[name="NOM"]').val("");
                   $('[name="ADRESSE"]').val("");
                   $('[name="TEL"]').val("");
                   $('[name="TRANS"]').val("");
                   $('[name="NUM_SERV"]').val("");
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
           const nom = $(this).data('nom');
           const trans = $(this).data('trans');
           const ad = $(this).data('ad');
           const tel = $(this).data('tel');
           
           $('.NUM_F').val(id);
           $('.NOM').val(nom);
           $('.TRANS').val(trans);
           $('.ADRESSE').val(ad);
           $('.TEL').val(tel);
           
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_F = $('.NUM_F').val();
           var NOM = $('.NOM').val();
           var TRANS = $('.TRANS').val();
           var ADRESSE = $('.ADRESSE').val();
           var TEL = $('.TEL').val();
           
            if(NOM==""){
                $('#fr1').html(texte);
                return false;
            }

            else if(NOM!=""){
                $('#fr1').html("");
            }

            if(TRANS!="0" && ADRESSE!=""){
                $('#adresse1').html("");
            }

            if(TRANS!="0" && ADRESSE==""){
                $('#adresse1').html(texte);
                return false;
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
                $('#tel1').html('Ce champ doit contenir 10 chiffres sans espace');
               return false;
            }
            
          else{
           $.ajax({
               type : "POST",
               url  : 'fournisseur/update/',
              
               data : {NUM_F:NUM_F, NOM:NOM, ADRESSE:ADRESSE, TEL:TEL},
               success: function(){
                   $('[name="NUM_F"]').val("");
                   $('[name="NOM"]').val("");
                   $('[name="ADRESSE"]').val("");
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
        $('#NUM_F').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_F = $('#NUM_F').val();
        $.ajax({
            type : "POST",
            url  : 'fournisseur/delete/',
            data : {NUM_F:NUM_F},
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

