<?php
session_start();
?>

<div id="response"></div>

<script type="text/javascript">
 
    setInterval(function () {

        var xmlhtpp = new XMLHttpRequest();
        xmlhtpp.open("GET", "response.php", false);
        xmlhtpp.send(null);
        document.getElementById("response").innerHTML = xmlhtpp.responseText;






    },1000)
        





    
</script>
