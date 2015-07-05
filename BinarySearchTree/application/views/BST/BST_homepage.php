<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Binary Search Tree</title>

    <!-- Bootstrap -->
  <!-- <link href="<?php ;//echo base_url('static/3rdparty/bootstrap-3.3.4-dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php ;//echo base_url('static/css/style.css'); ?>" rel="stylesheet">
   -->  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<div class="form-container">
<div style="color:red"><?php echo $this->session->flashdata('error'); ?></div>
<?php echo form_open('BST/UseInput') ?>

      <div class="form-group">
        <label for="whattodo">What to do?</label>
        <select name = "whattodo"class="form-control">
        <option>Insert</option>
        <option>Delete</option>
        <option>Search</option>
        </select>
      </div>

		<div class="form-group">
				<label for="input">Input</label>
				<input type="text" class="form-control" id="input" placeholder="Enter any integer value" required="true" name="input">
			</div>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <button type="reset" class="btn btn-default" name="reset">Cancel</button> </br></br> 
</form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="<?php echo base_url('static/3rdparty/bootstrap-3.3.4-dist/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>
