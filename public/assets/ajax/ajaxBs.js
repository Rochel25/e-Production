
    $(document).ready(function(){

        //call function show all produc
        date();
        affiche();
        
       $("#daty").on('change',function(){
        affiche($.trim($(this).val()));
        });
        
       
       $('#cat').on('change',function(){

        var CAT = $('#cat').val();
        
         $.ajax({
               
                 url:'bnent/designation/'+CAT,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                     
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<option value="'+data[i].NUM_PROD+'">'+data[i].DESIGNATION+'</option>';
                    }
                    $('#NUM_PROD').html(html);
                    prod();
                    nomprod();

                    if(CAT=="Produit fini"){
                        document.getElementById('prix').style.display='block';
                        document.getElementById('DATE_S').style.marginRight='0px';
                    }

                    if(CAT!="Produit fini"){
                        document.getElementById('prix').style.display='none';
                        document.getElementById('DATE_S').style.marginRight="50px";
                    }


                    if(CAT!='Outillage'){
                        document.getElementById('INTERNE').style.display='none';
                        document.getElementById('emprunteur').style.display='none';
                        document.getElementById('emprunteur1').style.display='none';
                    }

                    if(CAT!='Outillage' && $("#choix2").is(':checked')){
                        document.getElementById('ACHAT').style.display='none';
                        document.getElementById('empr').style.display='none';
                        document.getElementById('fournisseur').style.display='block';
                       
                    }

                    if(CAT==""){
                        document.getElementById('INTERNE').style.display='none';
                        document.getElementById('emprunteur').style.display='none';
                    }

                    else if(CAT=="Outillage"){
                        document.getElementById('INTERNE').style.display='block';
                        document.getElementById('emprunteur').style.display='block';
                        document.getElementById('emprunteur1').style.display='none';
                    }

                    if(CAT=="Outillage" && $("#choix1").is(':checked') ){
                        document.getElementById('emprunteur').style.display='block';
                        document.getElementById('emprunteur1').style.display='none';
                    }

                    if(CAT=="Outillage" && $("#choix2").is(':checked') ){
                        document.getElementById('emprunteur').style.display='none';
                        document.getElementById('emprunteur1').style.display='block';
                    }

                    if(CAT!='Produit fini'){
                        $("#PV").val('');
                    }

                   
                  }
                });
        })


        $('#choix1').on('change',function(){
            if($("#choix1").is(':checked')){
                document.getElementById('emprunteur').style.display='block';
                document.getElementById('emprunteur1').style.display='none'; 
            }
            })

            if($("#choix1").is(':checked')){
                document.getElementById('emprunteur').style.display='block';
                document.getElementById('emprunteur1').style.display='none'; 
            }

            if($("#choix2").is(':checked')){
                document.getElementById('emprunteur').style.display='none';
                document.getElementById('emprunteur1').style.display='block';
            }
    
            if($('#cat').val()==""){
                document.getElementById('INTERNE').style.display='none';
                document.getElementById('prix').style.display='none';
                document.getElementById('DATE_S').style.marginRight='50px';
                document.getElementById('emprunteur').style.display='none';
                document.getElementById('emprunteur1').style.display='none';
                $('#NUM_PROD').val("");
            }
          
            $('#choix2').on('change',function(){
                if($("#choix2").is(':checked')){
                    document.getElementById('emprunteur').style.display='none';
                    document.getElementById('emprunteur1').style.display='block';
                    $('#EMPR').val("")
                }
                })


        function nomprod(){

            var NUMPRO = $('#NUM_PROD').val();
                    
            $.ajax({
                url:'bnent/design/'+NUMPRO,
                type:'GET',
                dataType:'Json',
                success:function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += 
                            '<input type="hidden" id="design" value="'+data[i].DESIGNATION+'"/>'
                            }
                            $('#nomprod').html(html);
                            
                            var CAT = $('#cat').val();
                            if(CAT=="Produit fini"){
                            var DES=$('#design').val();

                            $.ajax({
                                url:'bnent/cout/'+DES,
                                type:'GET',
                                dataType:'Json',
                                success:function(data){
                                   var i;
                                   var html="";
                                   for(i=0; i<data.length; i++){
                                    html += 
                                    '<input type="hidden" id="cout" value="'+data[i].cout+'"/>';
                                }
                                $('#COUT').html(html);
                                marge();
                               
                                 }
                               });
                        }
                    }
                    })
                }


            $('#NUM_PROD').on('change',function(){

                    var NUMPRO = $('#NUM_PROD').val();
                    $('#PV').val("");
                     $.ajax({
                           
                             url:'bnent/design/'+NUMPRO,
                             type:'GET',
                             dataType:'Json',
                             success:function(data){
                                 
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                  
                                html += 
                               '<input type="hidden" id="design" value="'+data[i].DESIGNATION+'"/>';
                                }
                                $('#nomprod').html(html);
                                var CAT = $('#cat').val();
                                if(CAT=="Produit fini"){
                                var DES=$('#design').val();

                                $.ajax({
                                    url:'bnent/cout/'+DES,
                                    type:'GET',
                                    dataType:'Json',
                                    success:function(data){
                                       var i;
                                       var html='';
                                       for(i=0; i<data.length; i++){
                                        html += 
                                        '<input type="hidden" id="cout" value="'+data[i].cout+'"/>';
                                        }
                                        $('#COUT').html(html);
                                        marge();
                                       
                                        }
                                   });
                                }
                            }
                            })
                        })

                        function marge(){
                          
                            swal({
                                title: 'Entrez la marge bénéficiaire:'+$('#design').val(),
                                html: '<br><input class="form-control" min="1" max="100" placeholder="Marge bénéficiaire en %" id="marge">'+
                                      '<span id="marg" class="champ" ></span>',
                                content: {
                                    element: "input",
                                    element1: "span",
                                    attributes: {
                                        placeholder: "Marge bénéficiaire en %",
                                        type: "text",
                                        id: "marge",
                                        className: "form-control form-control-sm"
                                        
                                    
							},
                            // element: "span",
                            //         attributes: {
                            //         id: "marg",
                            //         className: "champ"
                                        
                                    
							// },
                                },
                            
                                buttons: {
                                        cancel: {
                                        visible: true,
                                        className: 'btn btn-secondary btn-sm',
                                        text:'Annuler'
                                    },        			
                                    confirm: {
                                        className : 'btn btn-primary btn-sm',
                                        
                                    }
                                },
                            }).then((ok) => {
                                if (ok) {
                                    var mar=$('#marge').val();
                                    var cout=$('#cout').val();
                                    var total=(parseFloat(cout*mar)/100)+parseFloat(cout);
                                    $('#PV').val(total);
                                } else {
                                    swal.close();
                                }
                            });
                        } 
                        
                        
       
         //function show all product
       function affiche(para=""){
           $("#mydata").DataTable().clear();
           $.ajax({
               async:true,
               url:'bnsort/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                   
                   var i;
                   var role = $.trim($('#user').val());
                  
                   for(i=0; i<data.length; i++){
                    if(role =='admin'){
                        del='<a type="button" id="bleu"  class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_BS+'"  data-prod="'+data[i].NUM_PROD+'" data-qts="'+data[i].QT_S+'" data-raison="'+data[i].RAISON+'" data-date="'+data[i].DATE_S+'"></a>'+' '+
                            '<a type="button" id="rouge"  class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_BS+'" data-pro="'+data[i].NUM_PROD+'"></a>'
                   }else{
                        del='';
                   }

                   if(data[i].NOM_E!=null) {
                    del='';
                   }
                   

                   $('#mydata').dataTable().fnAddData([
                               
                               data[i].DESIGNATION,
                               data[i].QT_S,
                               data[i].RAISON,
                               data[i].DATE_S.split("-").reverse().join("/"),
                               data[i].NOM_E,
                               data[i].NOM_UT,
                               del,
                            ]);
                    }
                  
               },
           });
          
       }

       function date(){
        $.ajax({
            url:'bnsort/dat/',
            type:'GET',
            dataType:'Json',
            success:function(data){
               var html = '';
               var i;
               for(i=0; i<data.length; i++){
               html += 
              '<option value="'+data[i].dat+'">'+data[i].dat+'</option>';
               }
               $('#daty').html('<option value="">-Mois-</option>'+html);
             }
           });
        }
       
       function accepteApostrophe(ch) {
           ch = ch.replace(/\\/g,"\\\\")
           ch = ch.replace(/\'/g,"\\'")
           ch = ch.replace(/\"/g,"\\\"")
           return ch
           }
       
      
   
       $('#NUM_PROD').on('change',function(){

         var pro = $('#NUM_PROD').val();
         $.ajax({
                 url:'bnsort/produit/'+pro,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<input id="STOCK" type="hidden" value="'+data[i].STOCK+'"/>'+
                   '<input id="STOCK1" type="hidden" value="'+data[i].STOCK1+'"/>';
                    }
                    $('#stock').html(html);
                  }
                });
        })

        function prod(){
            var pro = $('#NUM_PROD').val();
                $.ajax({
                 url:'bnsort/produit/'+pro,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<input id="STOCK" type="hidden" value="'+data[i].STOCK+'"/>'+
                   '<input id="STOCK1" type="hidden" value="'+data[i].STOCK1+'"/>';
                    }
                    $('#stock').html(html);
                  }
                });
            }


       $('#btn_save').on('click',function(){
       
            var texte = "Veuillez remplir le champ s'il vous plait";
            var stock= $.trim($('#STOCK').val());
            var stock1= $.trim($('#STOCK1').val());
            var NUM_UT = $.trim($('#NUM_UT').val());

            if($("#choix1").is(':checked')){
            var EMPR = $.trim($('#EMPR').val());
            }

            if($("#choix2").is(':checked')){
            var EMPR = $.trim($('#EMPR1').val());
            }
           
            var PV = $.trim($('#PV').val());
            var NUM_PROD = $.trim($('#NUM_PROD').val());
            var QT_S = $.trim($('#QT_S').val());
            var RAISON = $.trim($('#RAISON').val());
            var DATE_S = $.trim($('#DATE_S').val());
            var RAISON=accepteApostrophe(RAISON);
            var CAT = $.trim($('#cat').val());
           
            if(CAT==""){
                $('#cate').html("Veuillez selectionner une catégorie");
                return false;
            }
            
             if(CAT!=""){
                $('#cate').html("");
            }

            if(CAT=="Outillage" && $("#choix1").is(':checked') && EMPR==""){
                $('#emp1').html("Veuillez selectionner un emprunteur");
                return false;
            }

            if(CAT=="Outillage" && $("#choix1").is(':checked') && EMPR!=""){
                $('#emp1').html("");
            }

            if(CAT=="Outillage" && $("#choix2").is(':checked') && EMPR==""){
                $('#emp2').html(texte);
                return false;
            }

            if(CAT=="Outillage" && $("#choix2").is(':checked') && EMPR!=""){
                $('#emp2').html("");
            }

            if(RAISON==""){
                $('#raison').html(texte);
                return false;
            } 

            if(RAISON!=""){
                $('#raison').html("");
            }    
            
            if(QT_S==""){
                $('#qts').html(texte);
                return false;
            }

            if(!($.isNumeric(QT_S)) && QT_S!=""){
                $('#qts').html("Ce champ ne doit contenir qu'un chiffre");
                return false;
            }
   
            if((parseInt(stock)==0) && (parseInt(QT_S)>=parseInt(stock))){
               $('#qts').html("Vous devez faire de l'entrée");
               return false;
            } 
           
            if(QT_S<=0){
                $('#qts').html("Cette doit être supérieure à 0");
                return false;
            } 
    
            if(CAT!="Outillage" && (parseInt(stock)!=0) && (parseInt(QT_S)>parseInt(stock))){
                $('#qts').html("Cette quantité doit être inférieure ou égale à "+stock);
                return false;
            }

            if(CAT!="Outillage" && (parseInt(QT_S) < parseInt(stock))){
                $('#qts').html("");
            }

            if(CAT=="Outillage" && parseInt(QT_S)>parseInt(stock1)){
                $('#qts').html("Cette quantité doit être inférieure ou égale à "+stock1);
                return false;
            }

            if(CAT=="Outillage" && (parseInt(QT_S) < parseInt(stock1))){
                $('#qts').html("");
            }

            if(DATE_S!=""){
                $('#date').html("");
            }         

            if(DATE_S==""){
                $('#date').html("Veuillez selectionner une date");
                return false;
            } 

           else{

           $.ajax({
               type : "POST",
               url  : 'bnsort/save/',
               data : {EMPR:EMPR,NUM_UT:NUM_UT,NUM_PROD:NUM_PROD,QT_S:QT_S,RAISON:RAISON,DATE_S:DATE_S,PV:PV},
               success: function(){
                   $('[name="CAT"]').val("");
                   $('[name="NUM_PROD"]').val("");
                   $('[name="QT_S"]').val("");
                   $('[name="EMPR"]').val("");
                   $('[name="PV"]').val("");
                   $('[name="DATE_S"]').val("");
                   $('[name="RAISON"]').val("");
                   $('#Modal_Add').modal('hide');
                   swal({
                    icon: 'success',
                    title:'Ajout avec succès!',
                    showConfirmButton: false,
                    timer:1500
                  })
                    affiche();
                    var oTable = $("#mydata").dataTable();
                    oTable.fnDraw();
               },
               error: function(){
                   alert(NUM_PROD);}
           });
           return false;
        }
       });

       //get data for update record
       $(document).on('click','.btn-edit',function(){
           const id = $(this).data('id');
           const prod = $(this).data('prod');
           const qts = $(this).data('qts');
           const raison = $(this).data('raison');
           const date = $(this).data('date');

          
           $('#QTS').val(qts);
           $('.NUM_BS').val(id);
           $('.NUM_PROD').val(prod);
           $('.QT_S').val(qts);
           $('.RAISON').val(raison);
           $('.DATE_S').val(date);
           
           $.ajax({
              
            url:'bnsort/produit/'+prod,
            type:'GET',
            dataType:'Json',
            success:function(data){
                
               var html = '';
               var i;
               for(i=0; i<data.length; i++){
               html += 
              '<input id="STOCK1" type="hidden" value="'+data[i].STOCK+'"/>';
               }
               $('#stock1').html(html);
              
             }
           });

           $('#Modal_Edit').modal('show');
       });

       $('.NUM_PROD').on('change',function(){

        var pro = $('.NUM_PROD').val();
        
         $.ajax({
                 url:'bnsort/produit/'+pro,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<input id="STOCK1" type="hidden"  value="'+data[i].STOCK+'"/>';
                    }
                    $('#stock1').html(html);
                   
                  }
                });
        })

       //update record to database
        $('#btn-update').on('click',function(){
          
           var texte = "Veuillez remplir le champ s'il vous plait";
           var qt= $.trim($('#QTS').val());
           var stock= $.trim($('#STOCK1').val());
           var NUM_BS = $.trim($('.NUM_BS').val());
           var NUM_PROD = $.trim($('.NUM_PROD').val());
           var QT_S = $.trim($('.QT_S').val());
           var RAISON = $.trim($('.RAISON').val());
           var DATE_S = $.trim($('.DATE_S').val());
           var sum=parseInt(stock) + parseInt(qt);

          if(QT_S==""){
             $('#qts1').html(texte);
             return false;
         }

         if(QT_S<=0 ){
            $('#qts1').html("Cette quantité doit être supérieure à 0");
            return false;
           } 

         if(!($.isNumeric(QT_S)) && QT_S!=""){
             $('#qts1').html("Ce champ ne doit contenir qu'un chiffre");
             return false;
         }

        if((parseInt(stock)==0) && (parseInt(QT_S)>=parseInt(stock))){
            $('#qts1').html("Vous devez faire de l'entrée");
            return false;
        } 

        if((parseInt(stock)!=0) && (parseInt(QT_S)>parseInt(sum))){
             $('#qts1').html("Cette quantité doit être inférieure ou égale à "+sum);
             return false;
        }

        if((parseInt(QT_S) < parseInt(sum))){
             $('#qts1').html("");
        }

        if(RAISON==""){
             $('#raison1').html(texte);
             return false;
        } 

        if(RAISON!=""){
             $('#raison1').html("");
        }    

        if(DATE_S!=""){
             $('#date1').html("");
         }         

        if(DATE_S==""){
             $('#date1').html("Veuillez selectionner une date");
             return false;
        } 
           else{

           $.ajax({
               type : "POST",
               url  : 'bnsort/update/',
               data : {NUM_BS:NUM_BS,NUM_PROD:NUM_PROD,QT_S:QT_S,RAISON:RAISON,DATE_S:DATE_S},
               success: function(){
                   $('[name="NUM_BS"]').val("");
                   $('[name="NUM_PROD"]').val("");
                   $('[name="QT_S"]').val("");
                   $('[name="RAISON"]').val("");
                   $('[name="DATE_S"]').val("");
                   $('#Modal_Edit').modal('hide');
                   swal({
                    icon: 'success',
                    title: 'Modification avec succès!',
                    showConfirmButton: false,
                    timer:1500
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
        var prod = $(this).attr('data-pro');

        // Set data to Form Edit
        $('#NUMBS').val(id);
        $('#NUMPROD').val(prod);
       
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_BS = $('#NUMBS').val();
        var NUM_PROD = $('#NUMPROD').val();
        $.ajax({
            type : "POST",
            url  : 'bnsort/delete/',
            data : {NUM_BS:NUM_BS,NUM_PROD:NUM_PROD},
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

