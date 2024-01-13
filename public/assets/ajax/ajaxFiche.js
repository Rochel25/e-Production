
$(document).ready(function(){

       affiche();
       $("#recherche").on('keyup',function(){
           affiche($.trim($(this).val()));
        })
           
      $('#service').on('change',function(){

        var SERVICE = $('#service').val();
        
         $.ajax({
               
                 url:'fiche/employe/'+SERVICE,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                     
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<option value="'+data[i].NUM_EMP+'">'+data[i].NOM+'</option>';
                    }
                    $('#employe').html(html);
                    $('#resp').html("");
                    prod();
                  }
                });
        })
      
        $('#employe').on('change',function(){

            var EMPL = $('#employe').val();
           
            $.ajax({
                  
                    url:'fiche/produit/'+EMPL,
                    type:'GET',
                    dataType:'Json',
                    success:function(data){
                        
                       var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                       html += 
                      '<option value="'+data[i].NUM_SERIE+'">'+data[i].NUM_SERIE+'</option>';
                     } 
                     $('#numpro').html(html);

                     var html1 = '';
                     for(i=0; i<data.length; i++){
                       html1 += 
                      '<option value="'+data[i].QT_E+'">'+data[i].QT_E+'</option>';
                     } $('#nbp').html(html1);
                     }
                   });
            })


            function prod(){

            var EMPL = $('#employe').val();
           
             $.ajax({
                   
                     url:'fiche/produit/'+EMPL,
                     type:'GET',
                     dataType:'Json',
                     success:function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                        html += 
                       '<option value="'+data[i].NUM_SERIE+'">'+data[i].NUM_SERIE+'</option>';
                      } 
                      $('#numpro').html(html);

                      var html1 = '';
                      for(i=0; i<data.length; i++){
                        html1 += 
                       '<option value="'+data[i].QT_E+'">'+data[i].QT_E+'</option>';
                      } $('#nbp').html(html1);
                      }
                    });
            }

         //function show all product
       function affiche(para=""){
        $("#mydata").DataTable().clear();
           $.ajax({
               async:true,
               url:'fiche/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                 
                   var i;
                   var heure='';
                   var btn='';
                   for(i=0; i<data.length; i++){
                       
                        if( data[i].HEURE_SORT!="00:00:00"){
                            btn='';
                            heure=data[i].HEURE_SORT;
                        }else{
                            heure='';
                            btn='<a type="button" id="bleu" href="#" class="btn-xm btn-edit fas fa-share-square" data-id="'+data[i].ID_FIC+'"  data-heure="'+data[i].HEURE_SORT+'"></a>';
                        }
                        var date=data[i].DATEF.split("-").reverse().join("/");
                        $('#mydata').dataTable().fnAddData([
                               
                               data[i].NOM,
                               data[i].HEURE_ENT,
                               heure+' '+btn,
                               data[i].RESP,
                               data[i].NB_PROD_FINI,
                               data[i].NUM_PROD_FINI,
                               data[i].OBS
                              ]);   
                        }
                        $('#da').html(date);  
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
           var texte = "Veuillez selectionner la responsabilité s'il vous plait";
           var RESP=$.trim($('#service').val());
           var NUM_EMP = $.trim($('#employe').val());
           var NBP= $.trim($('#nbp').val());
           var NUM_PROD = $.trim($('#numpro').val());
           var OBS = $.trim($('#OBS').val());
           var RESP=accepteApostrophe(RESP);
           var NUM_PROD=accepteApostrophe(NUM_PROD);
           //var exp=new RegExp("[a-zA-Z0-9\']");
           //var NOMFONCT=chaine.match(exp);
           if(RESP!=""){
            $('#resp').html("");
           
          }
           if(RESP==""){
               $('#resp').html(texte);
               return false;
           }
          
           
          
           else{
            
           $.ajax({
               type : "POST",
               url  : 'fiche/save/',
               data : {NUM_EMP:NUM_EMP,NBP:NBP,NUM_PROD:NUM_PROD,OBS:OBS},
               success: function(){
                  $('[name="NUM_SERV"]').val("");
                  $('[name="NUM_EMP"]').val("");
                  $('[name="NUM_PROD"]').val("");
                  $('[name="NBP"]').val("");
                  $('[name="OBS"]').val("");
                  $('[name="OBS"]').val("");
                  $('#Modal_Add').modal('hide');
                   swal({
                    icon: 'success',
                    title: 'Ajout avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                    affiche();
                   
               },
               error: function(){
                   alert("tsy mety");}
           });
           return false;
          }
       });

       //get data for update record
       $(document).on('click','.btn-edit',function(){
           const id = $(this).data('id');
           const heure = $(this).data('heure');
           
           $('.ID_FIC').val(id);
           $('.HEURE_SORT').val(heure);
           $('#Modal_Edit').modal('show');
       });

    $('#btn-update').on('click',function(){
        var ID_FIC=$('.ID_FIC').val();
        var HEURE_SORT=$('.HEURE_SORT').val();
    
          $.ajax({
              type:"POST",
              url:'fiche/update',
              data:{ID_FIC:ID_FIC,HEURE_SORT:HEURE_SORT},
              success: function(){
                $('[name="ID_FIC"]').val("");
                $('[name="HEURE_SORT"]').val("");
                $('#Modal_Edit').modal('hide');
                swal({
                        
                    icon: 'success',
                    title: 'Sortie avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                affiche();
                
          },
              error: function(){
                  alert ('erreur');}
              });
              return false;
          });
      
});

