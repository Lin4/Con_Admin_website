<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Email Report</h4>
      </div>
	  <form name="" method="post" >
      <div class="modal-body">
       	    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
	  
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo $base_url ?>/assets/libs/jquery-ui-1.11.0/jquery-ui.min.js"></script>
    <script src="<?php echo $base_url ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $base_url ?>/assets/js/jquery.validate.min.js"></script>
	<script>
	$(document).ready(function() {
		$(".validation").validate();
		
		$( ".datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});

		});
	</script>
  </body>
</html>
