<?php
session_start();




?>





















<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">





</script>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Waiting time</h4>
            </div>
            <div class="modal-body">
                <div id="demo"></div>
            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">

    $(document).ready(function() {
        $('#myModal').modal();

        //var distance = end.getTime() - n
        var myVar=setInterval(function(){myTimer()},1000);

        function myTimer() {
            //var d = new Date();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","response.php",false);
            xmlhttp.send(null);
            document.getElementById("demo").innerHTML = xmlhttp.responseText;
        }
    });


    //$(this).load('test.php');






    //alert(location.href='time.php');
    //window.location.href='trading.php?id=$id';
</script>


