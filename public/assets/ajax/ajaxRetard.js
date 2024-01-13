$(document).ready(function(){

    $('#bg').on('click',function(){
        var DATE = $('#date').val();
        $('#dat').val(DATE);

        $.ajax({
                url:'retard/ret/'+DATE,
                type:'GET',
                dataType:'Json',
                success:function(data){
                   var html = '';
                   var i;
                
                   for(i=0; i<data.length; i++){
        
                    html += '<tr>'+
                    '<td>'+data[i].nb+'</td>'+
                    '<td>'+data[i].nom+'</td>'+
                    '<td>'+data[i].dep+'</td>'+
                    '</tr>';
                   }
                 $('#tabl').html(html);
              
               },
              
               
        })
    });
})