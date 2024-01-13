
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
               url:'utilisateur/affiche/'+para,
               type:'GET',
               dataType : 'JSON',
               success:function(data){
                  
                   var i;
                   for(i=0; i<data.length; i++){
                      
                    $('#mydata').dataTable().fnAddData([
                                data[i].NOM_UT,
                                data[i].ROLE,
                                data[i].EMAIL,
                                data[i].MDP,
                                '<a type="button" id="bleu" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUM_UT+'"  data-nom="'+data[i].NOM_UT+'"  data-role="'+data[i].ROLE+'" data-mail="'+data[i].EMAIL+'" data-mdp="'+data[i].MDP+'" ></a>'+' '+
                                '<a type="button" id="rouge" class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUM_UT+'"></a>'
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
           var ROLE = $.trim($('#ROLE').val());
           var MAIL = $.trim($('#MAIL').val());
           var MDP = $.trim($('#MDP').val());
           var MAIL=accepteApostrophe(MAIL);
           var MDP=accepteApostrophe(MDP);

           if(NOM=="")
           {
                $("#nom").html(texte);
                return false;
           }

           else if(NOM!="")
           {
                $("#nom").html("");
           }

           if(ROLE=="")
           {
                $("#role").html("Veuillez selectionner un rôle");
                return false;
           }

           if(ROLE!="")
           {
                $("#role").html("");
           }

           if(MAIL=="")
           {
                $("#mail").html(texte);
                return false;
           }

           else if(MAIL.length > 0 && !(MAIL.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)))
            {
                $('#mail').html('Adresse email incorrecte');
                return false;
            }

            else if(MAIL!="")
           {
                $("#mail").html("");
           }

           if(ROLE!="")
           {
                $("#mdp").html("");
           }

           if(MDP=="")
           {
                $("#mdp").html(texte);
                return false;
           }

           else{

           $.ajax({
               type : "POST",
               url  : 'utilisateur/save/',
               data : {NOM:NOM, ROLE:ROLE, MDP:MDP, MAIL:MAIL},
               success: function(){
                   $('[name="NOM"]').val("");
                   $('[name="ROLE"]').val("");
                   $('[name="MDP"]').val("");
                   $('[name="MAIL"]').val("");
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
           const role = $(this).data('role');
           const mail = $(this).data('mail');
           const mdp = $(this).data('mdp');
          
           $('.NUM_UT').val(id);
           $('.NOM').val(nom);
           $('.ROLE').val(role);
           $('.MAIL').val(mail);
           $('.MDP').val(mdp);
         
           $('#Modal_Edit').modal('show');
       });

       //update record to database
        $('#btn-update').on('click',function(){
           var texte = "Veuillez remplir le champ s'il vous plait";
           var NUM_UT = $.trim($('.NUM_UT').val());
           var NOM = $.trim($('.NOM').val());
           var ROLE = $.trim($('.ROLE').val());
           var MAIL = $.trim($('.MAIL').val());
           var MDP = $.trim($('.MDP').val());
           var MAIL=accepteApostrophe(MAIL);
           var MDP=accepteApostrophe(MDP);

            if(NOM=="")
            {
                $("#nom1").html(texte);
                return false;
            }

            else if(NOM!="")
            {
                $("#nom1").html("");
            }

            if(ROLE=="")
            {
                $("#role1").html("Veuillez selectionner un rôle");
                return false;
            }

            if(ROLE!="")
            {
                $("#role1").html("");
            }

            if(MAIL=="")
            {
                $("#mail1").html(texte);
                return false;
            }

            else if(MAIL.length > 0 && !(MAIL.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)))
            {
                $('#mail1').html('Adresse email incorrecte');
                return false;
            }

            else if(MAIL!="")
            {
                $("#mail1").html("");
            }

            if(ROLE!="")
            {
                $("#mdp1").html("");
            }

            if(MDP=="")
            {
                $("#mdp1").html(texte);
                return false;
            }
          
           else{
           $.ajax({
               type : "POST",
               url  : 'utilisateur/update/',
               data : {NUM_UT:NUM_UT, NOM:NOM, ROLE:ROLE, MDP:MDP, MAIL:MAIL},
               success: function(){
                $('[name="NOM"]').val("");
                $('[name="ROLE"]').val("");
                $('[name="MDP"]').val("");
                $('[name="MAIL"]').val("");
                   
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
        $('#NUM_UT').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });
    
    //delete record to database
     $('#btn-delete').on('click',function(){
        var NUM_UT = $('#NUM_UT').val();
        $.ajax({
            type : "POST",
            url  : 'utilisateur/delete/',
            data : {NUM_UT:NUM_UT},
            success: function(){
                $('#deleteModal').modal('hide');
                swal({ 
                    icon: 'success',
                    title: 'Suppression avec succès!',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  var oTable = $("#mydata").dataTable();
                  oTable.fnDeleteRow();
                 affiche();
            }
        });
        return false;
    });
});

