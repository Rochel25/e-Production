$(document).ready(function(){

    $('#bg').on('click',function(){
        var DATE = $('#date').val();
        $('#dat').val(DATE);

        $.ajax({
                url:'historique/hist/'+DATE,
                type:'GET',
                dataType:'Json',
                success:function(data){
                   
                   var html = '';
                   var i;
                
                   for(i=0; i<data.length; i++){
        
                    html += '<tr>'+
                    '<td>'+data[i].DATEPOINTAGE.split("-").reverse().join("/")+'</td>'+
                    '<td>'+data[i].NOM+'</td>'+
                    '<td>'+data[i].DEPARTEMENT+'</td>'+
                    '<td>'+data[i].HEUREENTMA+'</td>'+
                    '<td>'+data[i].HEURESORTMA+'</td>'+
                    '<td>'+data[i].HEUREENTSO+'</td>'+
                    '<td>'+data[i].HEURESORTSO+'</td>'+
                    '<td>'+data[i].OBSERVATION+'</td>'+
                    '</tr>';
                   }
                 $('#tabl').html(html);
              
               },
               error:function(){
                alert(DATE);
               }
        })
    });
})