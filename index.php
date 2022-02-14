<?php

include_once("init.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="datetimepicker/jquery.datetimepicker.css" rel="stylesheet"> 
    <script src="datetimepicker/jquery.js"></script>
    
    

</head>

<body>
                    
                    <div class='row'>


                        <div class="col-md-2">                    

                        <form method='post' action='index.php'>    
                            <input type="text" name="from_date" id="demo_from" class="form-control dateFilter" placeholder="From Date" />
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="to_date" id="demo_to" class="form-control dateFilter" placeholder="To Date" />
                        </div>
                            
                        <div class="col-md-2">
                            <input type="button" name="search" id="btn_search" value="Search" class="btn btn-primary" />
                        </div>
                        </form>

                        </div>

                    <br>
		
      
		<table id="purchase_order" class="table table-bordered table-striped table-responsive-stack" id="tableOne">
			<thead class="alert-info">
				<tr>
                    <th>Name</th>
					<th>Email</th>
                    <th>Address</th>                    
                    <th>Time</th>
				</tr>
			</thead>
			<tbody>
                        <!-- default data before search  -->
                    <?php $data->view_data(); ?>

                    </tbody>
		</table>
                      </div>


                    </div>



    
        <script src="datetimepicker/build/jquery.datetimepicker.full.min.js"></script>





    <!-- keep the following scripts remain intact, it has to update html id to reload without page reload -->
    <script type="text/javascript">
$(document).ready(function() {

   
// inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
$('.table-responsive-stack').each(function (i) {
   var id = $(this).attr('id');
   //alert(id);
   $(this).find("th").each(function(i) {
      $('#'+id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+             $(this).text() + ':</span> ');
      $('.table-responsive-stack-thead').hide();
      
   });
   

});


$( '.table-responsive-stack' ).each(function() {
var thCount = $(this).find("th").length; 
var rowGrow = 100 / thCount + '%';
//console.log(rowGrow);
$(this).find("th, td").css('flex-basis', rowGrow);   
});




function flexTable(){
if ($(window).width() < 768) {
   
$(".table-responsive-stack").each(function (i) {
   $(this).find(".table-responsive-stack-thead").show();
   $(this).find('thead').hide();
});
   
 
// window is less than 768px   
} else {
   
   
$(".table-responsive-stack").each(function (i) {
   $(this).find(".table-responsive-stack-thead").hide();
   $(this).find('thead').show();
});
   
   

}
// flextable   
}      

flexTable();

window.onresize = function(event) {
 flexTable();
};


// document ready  
});

</script>



<script>

jQuery('#demo_from').datetimepicker();

jQuery('#demo_to').datetimepicker();

</script>




<script>
    $(document).ready(function () {

      $('#btn_search').click(function () {
        var from_date = $('#demo_from').val();
        alert(from_date);
        var to_date = $('#demo_to').val();
        
        if (from_date != '' && to_date != '') {
          $.ajax({
            url: "ajax_search_data.php",
            method: "POST",
            data: { from_date: from_date, to_date: to_date },
            
            success: function (data) {
              $('#purchase_order').html(data);
            }
          });
        }
        else {
          alert("Please Select the Date");
        }
      });
    });
  </script>


</body>

</html>