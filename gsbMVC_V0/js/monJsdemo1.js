$(function(){
/**
    $("#section1").on("click",
        function () {

        $("#section1").load("import.html")
    })
 **/


    /**$("#envoyer").on("click",
        function () {
            $("#sectionnom").load("import1bis.php",
                {"nom": $("#nom").val()})
        })**/

/**
    $("input#plat").on("click",function () {
        $("#pied").load("import1ter.php",{"plat" : $(this).val() });
    })
 **/

/**
    $("select[name='table']").on("change",
        function() {
        $("#pied").load("import1quart.php",{"table" : $(this).val() })
        })
**/

/**
$("select[name='table']").on("change",
    function() {
        $.get("import1quart.php",{"table" : $(this).val() },
            function(data){$("pied").html(data)})
    })
 **/

/**
$("select[name='table']").on("change",
    function() {
        $.get("import1quart.php",{"table" : $(this).val() },
            foncRetour) });
function foncRetour(data) {
    alert(data);
}
**/

/**

$("#bouton").on("click", function () {
    $.post("retourPost1.php",{"nom" : $("#nom").val(),
        "prenom" : $("#prenom").val(),
        "adresse" : $("#adresse").val(),
        "tel" : $("#tel").val() },
        foncRetour);
});

function foncRetour(data) {
    $("#pied").html(data);
}
 **/

$("select[name='table']").on("change",
    function() {
        $.get("import1quart.php",{"table" : $(this).val() },
            foncRetour)
});
    function foncRetour(data) {
       $["#tab"].empty();
       for( var key in data)
           $("#tab").append("<tr><td>"+key+"</td><td>"+data[key]+"</td></tr>")
    }



















    
    
    
    
    
    
    



}); // fin fonction principale