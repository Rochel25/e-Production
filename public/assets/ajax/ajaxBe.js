
    $(document).ready(function(){
        
        //call function show all product
        affiche();
        date();
      
       $("#daty").on('change',function(){
        affiche($.trim($(this).val()));
        });

        $('#NUM_E').on('change',function(){

            if($("#choix2").is(':checked')){
            var empr = $('#NUM_E').val();

            $.ajax({
                    url:'bnent/Quant/'+empr,
                    type:'GET',
                    dataType:'Json',
                    success:function(data){
                      
                       var i;
                       for(i=0; i<data.length; i++){
                        var qte=data[i].QTE;
                        var qts=data[i].QT_S;
                        if(empr==null || empr==''){
                            sous="";
                        }
                        else{
                            var sous=parseInt(qts)-parseInt(qte);
                        }
                      
                       }
                      
                       $('#QT_E').val(sous);
                       $('#QTRESTE').val(sous);
                     }
                   });
                }
           })



// $('#NUM_E').on('change',function(){

//             if($("#choix2").is(':checked')){
//             var empr = $('#NUM_E').val();

//             $.ajax({
//                     url:'bnent/Quant/'+empr,
//                     type:'GET',
//                     dataType:'Json',
//                     success:function(data){
                      
//                        var i;
//                        for(i=0; i<data.length; i++){
//                         $('#QT_E').val(data[i].QT_S);
//                        }
//                        $('#QT_E').val(data[i].QT_S);
//                      }
//                    });
//                 }
//            })


       $('#cat').on('change',function(){

        var CAT = $('#cat').val();
        
         $.ajax({
               
                 url:'bnent/designation/'+CAT,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                     
                    var html1 = '';
                    var i;
                    
                    for(i=0; i<data.length; i++){

                        html1 += 
                       '<option value="'+data[i].NUM_PROD+'">'+data[i].DESIGNATION+'</option>';
                        }
                        $('#NUM_PROD').html(html1);
                         nomprod();
                         if(CAT!='Produit fini'){
                            $('#NUM_SERIE').val("");
                            $('#SERIE').html("");
                         }
                         
                         if(CAT=='Produit fini'){
                            $('#SERIE').html('<label>N° de série</label>'+
                            '<input type="text"  id="NUM_SERIE" class="form-control NUMS"  name="NUM_SERIE" placeholder="N° de série" disabled/>'+
                            '<a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>');
                            $('#QT_E').val("1");
                            $("#QT_E").prop("disabled", true);
                        }

                        if(CAT!='Produit fini'){
                            $('#NUM_SERIE').val("");
                            $('#SERIE').html("");
                            $('#QT_E').val("");
                            $("#QT_E").prop("disabled", false);
                         }

                        if(CAT!='Outillage'){
                            document.getElementById('ACHAT').style.display='none';
                            document.getElementById('empr').style.display='none';
                            document.getElementById('fournisseur').style.display='block';
                         }

                         if(CAT!='Outillage' && $("#choix2").is(':checked')){
                            document.getElementById('ACHAT').style.display='none';
                            document.getElementById('empr').style.display='none';
                            document.getElementById('fournisseur').style.display='block';
                            document.getElementById('obs1').style.display='none';
                            $("#PU").prop("disabled", false);
                         }

                         if(CAT==""){
                            document.getElementById('ACHAT').style.display='none';
                            document.getElementById('empr').style.display='none';
                         }

                         else if(CAT=="Outillage"){
                            document.getElementById('obs1').style.display='block';
                            document.getElementById('ACHAT').style.display='block';
                            document.getElementById('empr').style.display='block';
                            document.getElementById('fournisseur').style.display='none';
                            
                         }

                        if(CAT=="Outillage" && $("#choix1").is(':checked') ){
                            document.getElementById('fournisseur').style.display='block';
                            document.getElementById('empr').style.display='none';
                            document.getElementById('obs1').style.display='none';
                            $("#PU").prop("disabled", false);
                        }

                        if(CAT=="Outillage" && $("#choix2").is(':checked') ){
                            $("#PU").prop("disabled", true);
                            var prod= $('#NUM_PROD').val();
            $.ajax({
                url:'bnent/Emprunteur/'+prod,
                type:'GET',
                dataType:'Json',
                success:function(data){
                   var html;
                   var i;
                   for(i=0; i<data.length; i++){
                    var qte=data[i].QTE;
                    var qts=data[i].QT_S;
                    var id=data[i].ide;
                    var nom=data[i].NOM_E;
                    if(parseInt(qts)==parseInt(qte)){
                        html +="";
                    }
                    else{
                        html += 
                        '<option value="'+id+'">'+nom+'</option>';
                    }
                    
                   }
                   $('#NUM_E').html('<option value="">-Emprunteur-</option>'+html);
                  
                 }
               });
        
        
                            
                        }

                        if(CAT!="Produit fini"){
                            $.ajax({
                                url:'bnent/Fournisseur1/',
                                type:'GET',
                                dataType:'Json',
                                success:function(data){
                                   var html;
                                   var i;
                                   for(i=0; i<data.length; i++){
                                    html += 
                                    '<option value="'+data[i].NUM_F+'">'+data[i].NOM+'</option>';
                                   }
                                   $('#NUM_F').html('<option value="">-Fournisseur-</option>'+html);
                                 }
                               });
                        }

                        if(CAT=="Produit fini"){
                            $.ajax({
                                url:'bnent/Fournisseur2/',
                                type:'GET',
                                dataType:'Json',
                                success:function(data){
                                   var html;
                                   var i;
                                   for(i=0; i<data.length; i++){
                                    html += 
                                    '<option value="'+data[i].NUM_F+'">'+data[i].NOM+'</option>';
                                   }
                                   $('#NUM_F').html('<option value="">-Fournisseur-</option>'+html);
                                 }
                               });
                        }
                        
                    }
                  
                });
        })

        $('#NUM_PROD').on('change',function(){
            if($("#choix2").is(':checked')){
            var prod= $('#NUM_PROD').val();
            $.ajax({
                url:'bnent/Emprunteur/'+prod,
                type:'GET',
                dataType:'Json',
                success:function(data){
                   var html;
                   var i;
                   for(i=0; i<data.length; i++){
                    var qt=data[i].QTE;
                    var qts=data[i].QT_S;
                    var id=data[i].ide;
                    var nom=data[i].NOM_E;
                    if(parseInt(qts)==parseInt(qt)){
                        html +="";
                    }
                    else{
                        html += 
                        '<option value="'+id+'">'+nom+'</option>';
                    }
                    
                   }
                   $('#NUM_E').html('<option value="">-Emprunteur-</option>'+html);
                 }
               });
            }
            })

       

        $('#choix1').on('click',function(){
        if($("#choix1").is(':checked')){
            document.getElementById('fournisseur').style.display='block';
            document.getElementById('empr').style.display='none';
            document.getElementById('obs1').style.display='none';
            $("#PU").prop("disabled", false);
             $("#QT_E").val("");
        }
        })

        if($('#cat').val()==""){
            document.getElementById('ACHAT').style.display='none';
            document.getElementById('empr').style.display='none';
            document.getElementById('obs1').style.display='none';
         }
      
        $('#choix2').on('click',function(){
            if($("#choix2").is(':checked')){
                document.getElementById('fournisseur').style.display='none';
                document.getElementById('empr').style.display='block';
                document.getElementById('obs1').style.display='block';
                $("#PU").prop("disabled", true);
               
                     var prod= $('#NUM_PROD').val();
                    $.ajax({
                        url:'bnent/Emprunteur/'+prod,
                        type:'GET',
                        dataType:'Json',
                        success:function(data){
                           var html;
                           var i;
                           for(i=0; i<data.length; i++){
                            var qte=data[i].QTE;
                            var qts=data[i].QT_S;
                            var id=data[i].ide;
                            var nom=data[i].NOM_E;
                            if(parseInt(qts)==parseInt(qte)){
                                html +="";
                            }
                            else{
                                html += 
                                '<option value="'+id+'">'+nom+'</option>';
                            }
                            
                           }
                           $('#NUM_E').html('<option value="">-Emprunteur-</option>'+html);
                         }
                       });
                   
                
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
                       '<input type="hidden" id="design" value="'+data[i].DESIGNATION+'"/>'+
                       '<input type="hidden" id="serie" value="'+data[i].serie+'"/>';    
                        }
                        $('#nomprod').html(html);
                        var DES = $('#design').val();
                        var SERIE = $('#serie').val();
                        var REG=new RegExp("^Anti-d");
                        var REG1=new RegExp("^GP");
                        var REG2=new RegExp("^Wa");
                        var dat = new Date;
                        var jour=dat.getDate();
                        var mois=dat.getMonth()+1;
                        var an=dat.getFullYear();
                        var date=jour+'-'+mois+'-'+an;
                      
                        if(DES.match(REG1)){
                            $('#NUM_SERIE').val("FUT/GPS/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }

                        if(DES.match(REG)){
                            $('#NUM_SERIE').val("FUT/A.D/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }
                           
                        if(DES.match(REG2)){
                            $('#NUM_SERIE').val("FUT/W.D/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }  

                        $.ajax({
                            url:'bnent/cout/'+DES,
                            type:'GET',
                            dataType:'Json',
                            success:function(data){
                               
                               var i;
                               for(i=0; i<data.length; i++){
                                $('#PU').val(data[i].cout);
                               }
                               $('#PU').val(data[i].cout);
                             }
                           });
                    }
                    });
            }

        $('#NUM_PROD').on('change',function(){

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
                       '<input type="hidden" id="design" value="'+data[i].DESIGNATION+'"/>'+
                       '<input type="hidden" id="serie" value="'+data[i].serie+'"/>';
                        }
                        $('#nomprod').html(html);
                        var DES = $('#design').val();
                        var SERIE = $('#serie').val();
                        var REG=new RegExp("^Anti-d");
                        var REG1=new RegExp("^GP");
                        var REG2=new RegExp("^Wa");
                        var dat = new Date;
                        var jour=dat.getDate();
                        var mois=dat.getMonth()+1;
                        var an=dat.getFullYear();
                        var date=jour+'-'+mois+'-'+an;
                            
                        if(DES.match(REG1)){
                            $('#NUM_SERIE').val("FUT/GPS/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }

                        if(DES.match(REG)){
                            $('#NUM_SERIE').val("FUT/A.D/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }

                        if(DES.match(REG2)){
                            $('#NUM_SERIE').val("FUT/W.D/"+date+'/'+(parseInt(SERIE)+parseInt(1)));
                        }  
                        
                        $.ajax({
                            url:'bnent/cout/'+DES,
                            type:'GET',
                            dataType:'Json',
                            success:function(data){
                               var i;
                               for(i=0; i<data.length; i++){
                                $('#PU').val(data[i].cout);
                            }
                            $('#PU').val(data[i].cout);
                             }
                           });

                      }
                      
                    });
            })

       
       
         //function show all product
       function affiche(para=""){
        $("#mydata").DataTable().clear();
           $.ajax({
                type  :'get',
                async:true,
                url:'bnent/affiche/'+para,
               dataType : 'JSON',
               success:function(data){
        
                   var i;
                   var del;
                   let pu;
                   var role = $.trim($('#user').val());
                   for(i=0; i<data.length; i++){
                      if(role =='admin'){
                            del='<a type="button" id="bleu"  class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_BE+'" data-cat="'+data[i].CATEGORIE+'" data-prod="'+data[i].NUM_PROD+'"  data-fou="'+data[i].NUM_F+'" data-qte="'+data[i].QT_E+'" data-pu="'+data[i].PU+'" data-date="'+data[i].DATEE+'"></a>'+' '+
                                '<a type="button" id="rouge"  class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_BE+'" data-pro="'+data[i].NUM_PROD+'"></a>';
                       }else{
                            del='';
                       }
                       

                       pu = parseFloat(data[i].PU).toLocaleString();
                       if(pu=='0'){
                        pu="";
                       }
                       else{
                        pu=pu+" "+"Ar";
                       }

                       if(data[i].NOM_E!=null) {
                        del='';
                       }

                       $('#mydata').dataTable().fnAddData([
                               
                               data[i].DESIGNATION,
                               data[i].NOM,
                               data[i].QT_E,
                               pu,
                               data[i].DATEE.split("-").reverse().join("/"),
                               data[i].NOM_E,
                               data[i].NOM_UT,
                               del
                            ]);
                        }
                                  
               },
           }); 
        }

        function date(){
            $.ajax({
                url:'bnent/dat/',
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
       
       //Save product
       $('#btn_save').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var CAT = $.trim($('#cat').val());
            var NUM_E = $.trim($('#NUM_E').val());
            var AFFECTATION = $.trim($('#AFFECTATION').val());
            var NUM_SERIE = $.trim($('.NUMS').val());
            var NUM_UT = $.trim($('#NUM_UT').val());
            var NUM_PROD = $.trim($('#NUM_PROD').val());
            var NUM_F = $.trim($('#NUM_F').val());
            var QT_E = $.trim($('#QT_E').val());
            var PU = $.trim($('#PU').val());
            var OBS = $.trim($('#OBS').val());
            var DATEE = $.trim($('#DATEE').val());
            var QTERESTE=$.trim($('#QTRESTE').val());
            var NUM_SERIE=accepteApostrophe(NUM_SERIE);
            
            if(CAT==""){
                $('#cate').html("Veuillez selectionner une catégorie");
                return false;
            }
            
            else if(CAT!=""){
                $('#cate').html("");
            
            }

            if((NUM_F=="" && $("#choix1").is(':checked')) || (NUM_F=="" && CAT!="Outillage") ){
                $('#fr').html("Veuillez selectionner un fournisseur");
                return false;
            }

            if((NUM_F!="" && $("#choix1").is(':checked')) || (NUM_F!="" && CAT!="Outillage") ){
                $('#fr').html("");
            }

            if(CAT=="Outillage" && NUM_E=="" && $("#choix2").is(':checked')){
                $('#emp').html("Veuillez selectionner un emprunteur");
                return false;
            }

            if(CAT=="Outillage" && NUM_E!="" && $("#choix2").is(':checked')){
                $('#emp').html("");
            }

            if(QT_E==""){
                $('#qte').html(texte);
                return false;
            }

            if(CAT=="Outillage" && parseInt(QT_E)>parseInt(QTERESTE) && $("#choix2").is(':checked')){
                $('#qte').html("Cette quantité doit être inférieure ou égale à "+QTERESTE);
                return false;
            }

            else if(CAT=="Outillage" && parseInt(QT_E)<=parseInt(QTERESTE) && $("#choix2").is(':checked')){
                $('#qte').html("");
               
            }

            if(!($.isNumeric(QT_E)) && QT_E!="" ){
                $('#qte').html("Ce champ ne doit contenir qu'un chiffre");
                return false;
            }

            if(CAT=="Outillage" && $("#choix2").is(':checked') && parseInt(QT_E)<="0"){
                $('#qte').html("Cette quantité doit être supérieure à 0");
                return false;
            } 

            else if(QT_E!=""){
                $('#qte').html("");
            }

            if(CAT=="Outillage" && PU=="" && $("#choix2").is(':checked')){
                $('#pu').html("");
                
            }

            if((CAT=="Outillage" && PU=="" && $("#choix1").is(':checked')) || (CAT!="Outillage" && PU=="")){
                $('#pu').html(texte);
                return false;
            }

            if(!($.isNumeric(PU)) && PU!=""){
                $('#pu').html("Ce champ ne doit contenir qu'un chiffre");
                return false;
            }

            else if(PU!=""){
                $('#pu').html("");
            }

            if(DATEE!=""){
                $('#date').html("");
               
            }

            if(DATEE==""){
                $('#date').html("Veuillez choisir une date");
                return false;
            }

           else{

           $.ajax({
               type : "POST",
               url  : 'bnent/save/',
               data : {NUM_E:NUM_E,NUM_UT:NUM_UT,NUM_SERIE:NUM_SERIE,NUM_PROD:NUM_PROD,NUM_F:NUM_F,QT_E:QT_E,PU:PU,DATEE:DATEE,AFFECTATION:AFFECTATION,OBS:OBS},
               success: function(){
                   $('[name="CAT"]').val(""); 
                   $('.PROD1').val("");
                   $('[name="NUM_F"]').val("");
                   $('[name="OBS"]').val("");
                   $('[name="NUM_E"]').val("");
                   $('[name="NUM_SERIE"]').val("");
                   $('[name="AFFECTATION"]').val("");
                   $('[name="QT_E"]').val("");
                   $('[name="PU"]').val("");
                   $('[name="DATEE"]').val("");
                   $('#Modal_Add').modal('hide');
                   swal({
                    icon: 'success',
                    title: 'Ajout avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    affiche();
                    date();
                    var oTable = $("#mydata").dataTable();
                    oTable.fnDraw();
               },
               error: function(){
                   alert(NUM_PROD+DATEE+NUM_F+QT_E+PU);}
           });
           return false;
        }
       });

       //get data for update record
       $(document).on('click','.btn-edit',function(){
           const id = $(this).data('id');
           const prod = $(this).data('prod');
           const fou = $(this).data('fou');
           const qte = $(this).data('qte');
           const pu = $(this).data('pu');
           const date = $(this).data('date');
           const cat = $(this).data('cat');
           
           $('.NUM_BE').val(id);
           $('.NUM_PROD').val(prod);
           $('.NUM_F').val(fou);
           $('.QT_E').val(qte);
           $('.PU').val(pu);
           $('.DATEE').val(date);
           $('.CAT').val(cat);

           if(cat=="Produit fini"){
            $(".QT_E").prop("disabled", true);
           }else{
            $(".QT_E").prop("disabled", false);
           }
           
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_BE = $.trim($('.NUM_BE').val());
           var NUM_PROD = $.trim($('.NUM_PROD').val());
           var NUM_F = $.trim($('.NUM_F').val());
           var QT_E = $.trim($('.QT_E').val());
           var PU = $.trim($('.PU').val());
           var DATEE = $.trim($('.DATEE').val());
           
            if(QT_E==""){
                $('#qte1').html(texte);
                return false;
            }

            if(!($.isNumeric(QT_E)) && QT_E!=""){
                $('#qte1').html("Ce champ ne doit contenir qu'une chiffre");
                return false;
            }

            if(QT_E<=0){
                $('#qte1').html("Cette quantité doit être supérieure à 0");
                return false;
            } 

            else if(QT_E!=""){
                $('#qte1').html("");
            }

            if(PU==""){
                $('#pu1').html(texte);
                return false;
            }

            if(!($.isNumeric(PU)) && PU!=""){
                $('#pu1').html("Ce champ ne doit contenir qu'un chiffre");
                return false;
            }

            else if(PU!=""){
                $('#pu1').html("");
            }

            if(DATEE!=""){
                $('#date1').html("");
           
            }

            if(DATEE==""){
                $('#date1').html("Veuillez choisir une date");
                return false;
            }
          
           else{
           $.ajax({
               type : "POST",
               url  : 'bnent/update/',
              
               data : {NUM_BE:NUM_BE,NUM_PROD:NUM_PROD,NUM_F:NUM_F,QT_E:QT_E,PU:PU,DATEE:DATEE},
               success: function(){
                   $('[name="NUM_BE"]').val("");
                   $('[name="NUM_PROD"]').val("");
                   $('[name="NUM_F"]').val("");
                   $('[name="QT_E"]').val("");
                   $('[name="PU"]').val("");
                   $('[name="DATEE"]').val("");
                   $('#Modal_Edit').modal('hide');
                   swal({
                    icon: 'success',
                    title: 'Modification avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  affiche();
                  date();
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
        $('#NUMBE').val(id);
        $('#NUMPROD').val(prod);
       
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_BE = $('#NUMBE').val();
        var NUM_PROD = $('#NUMPROD').val();
        $.ajax({
            type : "POST",
            url  : 'bnent/delete/',
            data : {NUM_BE:NUM_BE,NUM_PROD:NUM_PROD},
            success: function(){
                $('#deleteModal').modal('hide');
                swal({
                    icon: 'success',
                    title: 'Suppression avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                affiche();
                date();
                var oTable = $("#mydata").dataTable();
                oTable.fnDraw();
            }
        });
        return false;
    });

});

