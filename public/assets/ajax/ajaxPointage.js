
    $(document).ready(function(){
        
        affiche(); //call function show all product
        
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
        });
       
          //function show all product
        function affiche(para=""){
            $("#mydata").DataTable().clear();
            $.ajax({
                async:true,
                url:'pointage/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                success:function(data){ 
                   
                    var i;
                    var btnma1;
                    var entma;
                    var btnma2;
                    var sortma;
                    var btnso1;
                    var entso;
                    var btnso2;
                    var sortso;
                    var btnob;
                    var obs;
                   
                    for(i=0; i<data.length; i++){
                        
                        if(data[i].HEUREENTMA!="00:00:00"){
                            btnma1="";
                            entma=data[i].HEUREENTMA;
                        }else{
                            entma="";
                            btnma1='<a id="entre" type="button" class=" btn-md btn-arriv"  data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEUREENTMA+'" ><i class="fas fa-sign-in-alt"></i></a>';

                        }
                        if(data[i].HEURESORTMA!="00:00:00"){
                            btnma2="";
                            sortma=data[i].HEURESORTMA;
                        }else{
                            sortma="";
                            btnma2='<a id="sortie" type="button" class=" btn-md btn-sort1 fa fa-succes" data-id="'+data[i].IDPOINTAGE+'"  data-heure="'+data[i].HEURESORTMA+'"><i class="fas fa-sign-out-alt"></i></a>';
                        }
                        if(data[i].HEUREENTSO!="00:00:00"){
                            btnso1="";
                            entso=data[i].HEUREENTSO;
                        }else{
                            entso="";
                            btnso1='<a  id="entre" type="button" class="btn-md btn-ent1 fa fa-succes"  data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEUREENTSO+'"><i class="fas fa-sign-in-alt"></i></a>';
                        }
                        if(data[i].HEURESORTSO!="00:00:00"){
                            btnso2='';
                            sortso=data[i].HEURESORTSO;
                        }else{
                            sortso='';
                            btnso2='<a  id="sortie" type="button" class="btn-md btn-sort2 fa fa-succes" data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEURESORTSO+'"><i class="fas fa-sign-out-alt"></i></a>';
                        }
                        if (data[i].OBSERVATION!="") {
                            btnob="";
                            obs=data[i].OBSERVATION;
                        }else{
                            obs="";
                           btnob= '<a  id="obs" type="button" class="btn-md btn-obs " data-id="'+data[i].IDPOINTAGE+'" data-obs="'+data[i].OBSERVATION1+'"><i class="fas fa-eye"></i></a>';
                        }
                        var date=data[i].DATEPOINTAGE.split("-").reverse().join("/");
                        
                        $('#mydata').dataTable().fnAddData([

                                data[i].NOM,
                                data[i].DEPARTEMENT,
                                entma+' '+btnma1,
                                sortma+' '+btnma2,
                                entso+' '+btnso1,
                                sortso+' '+btnso2,
                                obs+' '+btnob
                            ]);
                    }
                   
                    $('#da').html(date);
                },
                
 
            });
        }
        
        //get data for update record
        $(document).on('click','.btn-arriv',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEUREENTMA').val(heure);
            $('#heureMaModal').modal('show');
        });
        //update record to database
         $('#btn-arriv').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEUREENTMA = $('#HEUREENTMA').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEUREENTMA:HEUREENTMA},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEUREENTMA"]').val("");
                    $('#heureMaModal').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Succès!',
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
        });
       
        $(document).on('click','.btn-sort1',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEURESORTMA').val(heure);
            $('#sortma').modal('show');
        });

        //update record to database
         $('#btn-sort1').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEURESORTMA = $('#HEURESORTMA').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update1/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEURESORTMA:HEURESORTMA},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEURESORTMA"]').val("");
                    $('#sortma').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Succès!',
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
        });
       
        $(document).on('click','.btn-ent1',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEUREENTSO').val(heure);
            $('#entso').modal('show');
        });
        
        //modif heure entree
         $('#btn-ent1').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEUREENTSO = $('#HEUREENTSO').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update2/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEUREENTSO:HEUREENTSO},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEUREENTSO"]').val("");
                    $('#entso').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Succès!',
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
        });
       

        $(document).on('click','.btn-sort2',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEURESORTSO').val(heure);
            $('#sortso').modal('show');
        });

        //modif heure sortie
         $('#btn-sort2').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEURESORTSO = $('#HEURESORTSO').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update3/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEURESORTSO:HEURESORTSO},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEURESORTSO"]').val("");
                    $('#sortso').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Succès!',
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
        });

        
        $(document).on('click','.btn-obs',function(){
            var id = $(this).attr('data-id');
            var obs = $(this).attr('data-obs');

            $('#IDPOINTAGE').val(id);
            $('#OBSERVATION1').val(obs);
            $('#obsModal').modal('show');
        });


        //modif observation
         $('#btn-obs').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var OBSERVATION = $('#OBSERVATION').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update4/',
               
                data : {IDPOINTAGE:IDPOINTAGE,OBSERVATION:OBSERVATION},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="OBSERVATION"]').val("");
                    $('#obsModal').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Succès!',
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
        });
       

       
});
 
