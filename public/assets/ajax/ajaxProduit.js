
    $(document).ready(function(){

        affiche();
        categorie();
       $("#categorie").on('change',function(){
        affiche($.trim($(this).val()));
        });

        //  fonction afficher produit
        function affiche(para=""){
             $("#tab").DataTable().clear();
               $.ajax({
                  type  :'get',
                  async:true,
                  url:'produit/affiche/'+para,
                  dataType : 'JSON',
                  success:function(data){         
                    
                    var role = $.trim($('#user').val());
                    var del;
                
                       for(let i=0; i<data.length; i++){
                        var seuil1=data[i].SEUILMIN;
                        var seuil2=data[i].SEUILMAX;
                        var stock=data[i].STOCK;
                        var stock1=data[i].STOCK1;
                       
                       
                            if(parseFloat(stock) < parseFloat(seuil1) )
                            {
                                col='<div class="bg1">';
                            }
    
                            else if(parseFloat(stock) >= parseFloat(seuil2))
                            {
                                col='<div class="bg">';
                            }
    
                            else if((parseFloat(stock) < parseFloat(seuil2)) || (parseFloat(stock) > parseFloat(seuil2)))
                            {
                                col='<div>';
                            }

                            if(stock1==0){
                                stock1=""
                            }
    
                            if(role =='admin'){
                            del='<a type="button" id="bleu"  class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_PROD+'"  data-nom="'+data[i].DESIGNATION+'"  data-cat="'+data[i].CATEGORIE+'"  data-stock="'+data[i].STOCK+'"  data-stock1="'+data[i].STOCK1+'" data-seuil1="'+data[i].SEUILMIN+'" data-seuil2="'+data[i].SEUILMAX+'" data-tp="'+data[i].TAVR+'" data-qt="'+data[i].QTA+'" ></a>'+' '+
                                '<a type="button" id="rouge"  class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_PROD+'"></a>'
                            }else{
                            del='';
                                    }
                                    
                                    $('#tab').dataTable().fnAddData([
                                        
                                        col+data[i].DESIGNATION,
                                        col+data[i].CATEGORIE,
                                        col+stock,
                                        col+stock1,
                                        col+seuil1,
                                        col+seuil2,
                                        col+data[i].TAVR,
                                        col+data[i].QTA,
                                        col+del
                                       
                                    ]);
                                }  
                              
                            },
                       });
                  }

    function categorie(){
        $.ajax({
            url:'produit/categorie/',
            type:'GET',
            dataType:'Json',
            success:function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<option value="'+data[i].CATEGORIE+'">'+data[i].CATEGORIE+'</option>';
                           }
                        $('#categorie').html( '<option value="">-Catégorie-</option>'+html);
                         }
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
           var DESIGNATION = $.trim($('#DESIGNATION').val());
           var CATEGORIE = $.trim($('#CATEGORIE').val());
           var STOCK = $.trim($('#STOCK').val());
           var SEUILMIN = $.trim($('#SEUILMIN').val());
           var SEUILMAX = $.trim($('#SEUILMAX').val());
           var TAVR = $.trim($('#TAVR').val());
           var QTA = $.trim($('#QTA').val());
           var DESIGNATION=accepteApostrophe(DESIGNATION);
           var CATEGORIE=accepteApostrophe(CATEGORIE);

           if(CATEGORIE=='Outillage'){
           var STOCK1=STOCK
           document.getElementById('STOCK1').value=STOCK1;
           }
    
          if(DESIGNATION==""){
               $('#design').html(texte);
               return false;
          }
           
          else if(DESIGNATION!=""){
               $('#design').html(""); 
          }

          if(CATEGORIE==""){
              $('#cat').html("Veuillez selectionner une catégorie");
              return false;
          }

          else if(CATEGORIE!=""){
               $('#cat').html("");
          }

          if(SEUILMIN==""){
              $('#smin').html(texte);
              return false;
          }

          if(!($.isNumeric(SEUILMIN)) && SEUILMIN!=""){
              $('#smin').html("Ce champ ne doit contenir qu'un chiffre");
              return false;
          }

          if(parseInt(SEUILMIN)>parseInt(SEUILMAX)){
              $('#smin').html("Le seuil minimum doit être inférieur au seuil maximum");
              return false;
          }

          else if(SEUILMIN!=""){
              $('#smin').html("");
          }

          if(SEUILMAX==""){
              $('#smax').html(texte);
              return false;
          }

          if(!($.isNumeric(SEUILMAX)) && SEUILMAX!=""){
              $('#smax').html("Ce champ ne doit contenir qu'un chiffre");
              return false;
          }

          if(parseInt(SEUILMAX)<parseInt(SEUILMIN)){
              $('#smax').html("Le seuil maximum doit être inférieur au seuil minimum");
              return false;
          }

          else if(SEUILMAX!=""){
              $('#smax').html("");
          }

          if(!($.isNumeric(TAVR)) && TAVR!=""){
              $('#tavr').html("Ce champ ne doit contenir qu'un chiffre");
              return false;
          }

          else if(TAVR!=""){
              $('#tavr').html("");
          }

          if(QTA!=""){
            $('#qta').html("");
          }

          if(!($.isNumeric(QTA)) && QTA!=""){
              $('#qta').html("Ce champ ne doit contenir qu'un chiffre");
              return false;
          }

          

           else{

           $.ajax({
               type : "POST",
               url  : 'produit/save/',
               data : {DESIGNATION:DESIGNATION,CATEGORIE:CATEGORIE, STOCK:STOCK,SEUILMIN:SEUILMIN,SEUILMAX:SEUILMAX, TAVR:TAVR,QTA:QTA,STOCK1:STOCK1},
               success: function(){
                   $('[name="DESIGNATION"]').val("");
                   $('[name="CATEGORIE"]').val("");
                   $('[name="STOCK"]').val("");
                   $('[name="SEUILMIN"]').val("");
                   $('[name="SEUILMAX"]').val("");
                   $('[name="TAVR"]').val("");
                   $('[name="QTA"]').val("");
                  
                   $('#Modal_Add').modal('hide');
                   
                    swal({
                        icon: 'success',
                        title: 'Ajout avec succès!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    affiche();
                    categorie();
                    var oTable = $("#tab").dataTable();
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
           const cat =$(this).data('cat');
           const stock = $(this).data('stock');
           const stock1 = $(this).data('stock1');
           const seuil1 = $(this).data('seuil1');
           const seuil2 = $(this).data('seuil2');
           const tp = $(this).data('tp');
           const qt = $(this).data('qt');
          
           $('.NUM_PROD').val(id);
           $('.DESIGNATION').val(nom);
           $('.CATEGORIE').val(cat);
           $('.STOCK').val(stock);
           $('#STOCK2').val(stock1);
           $('.SEUILMIN').val(seuil1);
           $('.SEUILMAX').val(seuil2);
           $('.TAVR').val(tp);
           $('.QTA').val(qt);

           if(cat=="Outillage"){
            $(".STOCK").prop("disabled", false);
           }else{
            $(".STOCK").prop("disabled", true);
           }
           
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_PROD = $.trim($('.NUM_PROD').val());
           var DESIGNATION = $.trim($('.DESIGNATION').val());
           var CATEGORIE = $.trim($('.CATEGORIE').val());
           var STOCK = $.trim($('.STOCK').val());
           var SEUILMIN =  $.trim($('.SEUILMIN').val());
           var SEUILMAX =  $.trim($('.SEUILMAX').val());
           var TAVR =  $.trim($('.TAVR').val());
           var QTA =  $.trim($('.QTA').val());
           var CATEGORIE=accepteApostrophe(CATEGORIE);
           var DESIGNATION=accepteApostrophe(DESIGNATION);

        if(CATEGORIE=='Outillage'){
            var STOCK1=STOCK
            document.getElementById('STOCK2').value=STOCK1;
        }

        if(DESIGNATION==""){
              $('#design1').html(texte);
              return false;
        }
        
       else if(DESIGNATION!=""){
            $('#design1').html(""); 
       }

       if(CATEGORIE==""){
           $('#cat1').html(texte);
           return false;
       }

       else if(CATEGORIE!=""){
            $('#cat1').html("");
       }

       if(SEUILMIN==""){
           $('#smin').html(texte);
           return false;
       }

       if(!($.isNumeric(SEUILMIN)) && SEUILMIN!=""){
           $('#smin1').html("Ce champ ne doit contenir qu'un chiffre");
           return false;
       }

       if(parseInt(SEUILMIN)>parseInt(SEUILMAX)){
           $('#smin1').html("Le seuil minimum doit être inférieur au seuil maximum");
           return false;
       }

       else if(SEUILMIN!=""){
           $('#smin1').html("");
       }

       if(SEUILMAX==""){
           $('#smax1').html(texte);
           return false;
       }

       if(!($.isNumeric(SEUILMAX)) && SEUILMAX!=""){
           $('#smax1').html("Ce champ ne doit contenir qu'un chiffre");
           return false;
       }

       if(parseInt(SEUILMAX)<parseInt(SEUILMIN)){
           $('#smax1').html("Le seuil maximum doit être inférieur au seuil minimum");
           return false;
       }

       else if(SEUILMAX!=""){
           $('#smax1').html("");
       }

       if(!($.isNumeric(TAVR)) && TAVR!=""){
           $('#tavr1').html("Ce champ ne doit contenir qu'un chiffre");
           return false;
       }

        if(TAVR!=""){
           $('#tavr1').html("");
       }

        if(QTA!=""){
         $('#qta1').html("");
       }

       if(!($.isNumeric(QTA)) && QTA!=""){
           $('#qta1').html("Ce champ ne doit contenir qu'un chiffre");
           return false;
       }

          else{
           $.ajax({
               type : "POST",
               url  : 'produit/update/',
               async: false,
               data : {NUM_PROD:NUM_PROD ,DESIGNATION:DESIGNATION ,CATEGORIE:CATEGORIE, STOCK:STOCK, SEUILMIN:SEUILMIN, SEUILMAX:SEUILMAX, TAVR:TAVR, QTA:QTA, STOCK1:STOCK1},
               success: function(){
                   $('[name="NUM_PROD"]').val("");
                   $('[name="DESIGNATION"]').val("");
                   $('[name="CATEGORIE"]').val("");
                   $('[name="STOCK1"]').val("");
                   $('[name="STOCK"]').val("");
                   $('[name="SEUILMIN"]').val("");
                   $('[name="SEUILMAX"]').val("");
                   $('[name="TAVR"]').val("");
                   $('[name="QTA"]').val("");
                   
                   $('#Modal_Edit').modal('hide');
                   swal({
                    icon: 'success',
                    title: 'Modification avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                 affiche();
                 categorie();
                 var oTable = $("#tab").dataTable();
                 oTable.clear();
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
        $('#NUMPROD').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_PROD = $('#NUMPROD').val();
        $.ajax({
            type : "POST",
            url  : 'produit/delete/',
            async: false,
            data : {NUM_PROD:NUM_PROD},
            success: function(){
                $('#deleteModal').modal('hide');
                swal({
                    icon: 'success',
                    title: 'Suppression avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    affiche();
                    categorie();
                    var oTable = $("#tab").dataTable();
                    oTable.fnDraw();
            }
        });
        return false;
    });
});

