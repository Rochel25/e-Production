
    $(document).ready(function(){
         
        //call function show all product
        affiche();
      
         //function show all product
       function affiche(){
        $("#mydata").DataTable().clear();
           $.ajax({
               async:true,
               url:'element/affiche/',
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                   
                   var i;
                   for(i=0; i<data.length; i++){

                    $('#mydata').dataTable().fnAddData([

                               data[i].DESIGNATION,
                               data[i].PROD_FINI,
                               data[i].QT_EL,
                               parseFloat(data[i].COUT).toLocaleString()+" "+"Ar",
                               '<a type="button" id="bleu"  class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].ID_EL+'" data-id1="'+data[i].NUM_PROD+'"  data-nom="'+data[i].PROD_FINI+'"  data-qte="'+data[i].QT_EL+'" data-cout="'+data[i].COUT+'"></a>'+' '+
                               '<a type="button" id="rouge"  class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].ID_EL+'"></a>',
                            //    '<a type="button" id="vert"  class=" btn-xm btn-update fa fa-redo-alt" data-id="'+data[i].ID_EL+'" data-id1="'+data[i].NUM_PROD+'" data-qte="'+data[i].QT_EL+'" data-cout="'+data[i].COUT+'"></a>',
                                
                            ]);
                    }
               },  
           });
       }

       $('#NUM_PROD').on('change',function(){
        var pro = $('#NUM_PROD').val();
        $.ajax({
                url:'element/prix/'+pro,
                type:'GET',
                dataType:'Json',
                success:function(data){
                  var html="";
                   var i;
                   for(i=0; i<data.length; i++){
                    html += 
                    '<input type="hidden" id="PRIX" name="PRIX" value="'+data[i].PU+'"/>';          
                   }
                   $('#prix').html(html);
                 }
               });
            
       })

       $('#QT_EL').on('keyup',function(){
        
        var prix = $('#PRIX').val();
        var qte=$('#QT_EL').val();
        var total=parseFloat(prix*qte);
        if(qte!=''){
            $('#COUT').val(parseFloat(total));
        }else{
            $('#COUT').val("");
        }
       })


   
       function accepteApostrophe(ch) {
           ch = ch.replace(/\\/g,"\\\\")
           ch = ch.replace(/\'/g,"\\'")
           ch = ch.replace(/\"/g,"\\\"")
           return ch
           }
       
       //Save product
       $('#btn_save').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_PROD = $.trim($('#NUM_PROD').val());
           var PROD_FINI = $.trim($('#PROD_FINI').val());
           var QT_EL = $.trim($('#QT_EL').val());
           var COUT = $.trim($('#COUT').val());
           var PROD_FINI=accepteApostrophe(PROD_FINI)

            if(NUM_PROD==""){
                $('#mat').html("Veuillez selectionner une matière première ");
                return false;
            }

            if(NUM_PROD!=""){
                 $('#mat').html("");
            }

            if(PROD_FINI==""){
                $('#prodfini').html("Veuillez selectionner un produit fini");
                return false;
            }

            else if(PROD_FINI!=""){
                $('#prodfini').html("");
            }

            if(QT_EL=="")
            {
                $('#qt_el').html(texte);
               return false;
            }

            if(QT_EL!=""){
                $('#qt_el').html("");
            }
            
             if(!($.isNumeric(QT_EL)))
            {
                $('#qt_el').html("Ce champ ne doit contenir qu'un chiffre");
                return false;
            }
            
           else{

           $.ajax({
               type : "POST",
               url  : 'element/save/',
               data : {NUM_PROD:NUM_PROD,PROD_FINI:PROD_FINI,QT_EL:QT_EL,COUT:COUT},
               success: function(){
                   $('[name="NUM_PROD"]').val("");
                   $('[name="PROD_FINI"]').val("");
                   $('[name="QT_EL"]').val("");
                   $('[name="COUT"]').val("");
                   $('[name="PRIX"]').val("");
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

       $('.QT_EL').on('keyup',function(){
        
        var prix = $('#PRIX1').val();
        var qte=$('.QT_EL').val();
        var total=parseFloat(prix*qte);
        if(qte!=''){
            $('.COUT').val(parseFloat(total));
        }else{
            $('.COUT').val("");
        }
       
        
       })

    //    $('.btn-update').on('click',function(){
    //     const id = $(this).data('id');
    //     const id1 = $(this).data('id1');
    //     const qte = $(this).data('qte');
    //     $.ajax({
    //         url:'element/prix/'+id1,
    //         type:'GET',
    //         dataType:'Json',
    //         success:function(data){
    //           var html="";
    //            var i;
    //            for(i=0; i<data.length; i++){
    //             html += 
    //             '<input type="hidden" id="PRIX2" name="PRIX2" value="'+data[i].PU+'"/>';          
    //            }
              
    //          }
    //        });
    //        var prix=$('#PRIX2').val();
    //        var cout=prix*qte;
    //        $.ajax({
    //         type : "POST",
    //         url  : 'element/update1/'+id,
    //         data : {cout:cout},
    //         success: function(){
    //             swal({
                     
    //              icon: 'success',
    //              title: 'Mise à jour réussi!',
    //              showConfirmButton: false,
    //              timer: 1500
    //            })
    //            affiche();
    //            var oTable = $("#mydata").dataTable();
    //            oTable.fnDraw();
    //         },
    //         error: function(){
    //             alert('erreur');}
    //     });

    //    })

       //get data for update record
       $(document).on('click','.btn-edit',function(){
           const id = $(this).data('id');
           const id1 = $(this).data('id1');
           const nom = $(this).data('nom');
           const qte = $(this).data('qte');
           const cout = $(this).data('cout');
          
           $('.ID_EL').val(id);
           $('.NUM_PROD').val(id1);
           $('.PROD_FINI').val(nom);
           $('.QT_EL').val(qte);
           $('.COUT').val(cout);
           
           $.ajax({
                   url:'element/prix/'+id1,
                   type:'GET',
                   dataType:'Json',
                   success:function(data){
                     var html="";
                      var i;
                      for(i=0; i<data.length; i++){
                       html += 
                       '<input type="hidden" id="PRIX1" name="PRIX1" value="'+data[i].PU+'"/>';          
                      }
                      $('#prix1').html(html);
                    }
                  });

           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var ID_EL = $.trim($('.ID_EL').val());
           var NUM_PROD = $.trim($('.NUM_PROD').val());
           var PROD_FINI = $.trim($('.PROD_FINI').val());
           var QT_EL = $.trim($('.QT_EL').val());
           var COUT = $.trim($('.COUT').val());
           var PROD_FINI=accepteApostrophe(PROD_FINI)

           
        if(NUM_PROD==""){
            $('#mat1').html("Veuillez selectionner une matière première ");
            return false;
        }

        if(NUM_PROD!=""){
             $('#mat1').html("");
        }

        if(PROD_FINI==""){
            $('#prodfini1').html("Veuillez selectionner un produit fini");
            return false;
        }

        else if(PROD_FINI!=""){
            $('#prodfini1').html("");
        }

        if(QT_EL=="")
        {
            $('#qt_el1').html(texte);
           return false;
        }

        if(QT_EL!=""){
            $('#qt_el1').html("");
        }
        
         if(!($.isNumeric(QT_EL)))
        {
            $('#qt_el1').html("Ce champ ne doit contenir qu'un chiffre");
            return false;
        }
        
           else{
           $.ajax({
               type : "POST",
               url  : 'element/update/',
               data : {ID_EL:ID_EL,NUM_PROD:NUM_PROD,PROD_FINI:PROD_FINI,QT_EL:QT_EL,COUT:COUT},
               success: function(){
                   
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
        $('#ID_EL').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var ID_EL = $('#ID_EL').val();
        $.ajax({
            type : "POST",
            url  : 'element/delete/',
            data : {ID_EL:ID_EL},
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

