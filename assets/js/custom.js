 $(document).ready(function(){

     //    
            $("#pepe").on("change",function(){
                var juan =  $('#pepe').val();
                 var pedro =  $('#pepe option:selected').text();
                var paco = $("#"+pedro).val(); 
                $("#foo").append("<tr class='active'><td><input type='hidden' value='"+juan+"' class='form-control' name='"+pedro+"'> "+pedro+" </td> <th> <input type='text' class='form-control' name='qty"+pedro+"'> </th>  <th> "+paco+" </th></tr>");
                var nowv = $("#arcangel").text();
                var summm = parseInt(nowv)  + parseInt(paco); 
                $("#arcangel").text(summm);
                $("#total").attr("value", summm);
            });
            
            
            
   
//        var anoDesde = $("#anoDesde");
//        $("#listaAnoDesde li").on("click", function () {
//          var selecion =  $(this).text();
//          anoDesde.text(selecion);
//        $("#elano1").attr('value', selecion);
//        });
//        
//         var anoHasta = $("#anoHasta");
//        $("#listaAnoHasta li").on("click", function () {
//          var selecion =  $(this).text();
//          anoHasta.text(selecion);
//          
//           if($("#anoDesde").text() >= selecion)
//          {
//              alert("Seleccion un año mas reciente");
//              $("#anoHasta").text("Hasta");
//          }
//          
//          else
//          {
//               $("#elano2").attr('value', selecion);
//          }
        
        });
        
    