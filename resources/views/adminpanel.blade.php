<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{ config('app.name') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		
	<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
  
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
        
		<?php //include('header.php'); ?>
		
		@include('layouts.header');
		@include('layouts.sidebar1');
		
		<?php //include('sidebar.php'); ?>
	<div class="content-wrapper">
 <section class="content-header">
      <h1>
        <legend>Booking Details</legend>
      </h1>
	  <table class="table" id="table_id">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Service</th>
      <th>Contact</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php  
	$uid =session()->get('globalid');;
	
	//echo $uid;
	
	//DB::select("SELECT users.*,profile.* FROM users INNER JOIN profile ON users.id=profile.uid WHERE profile.uid='$globaluserid'");
	
	$result=DB::select("SELECT assigns.uid,assigns.sid,appointment.* FROM assigns INNER JOIN appointment ON assigns.sid=appointment.id WHERE assigns.uid='$uid'");
	
	  
	  $i=0;
	foreach($result as $row)
	{	
	 $i=$i+1;
		echo '<tr>
      <th scope="row">'.$i.'</th>
      <td>'.$row->v_name.'</td>
      <td>'.$row->v_gadget.'</td>
      <td>'.$row->v_contactno.'</td>
      <td><a href="viewservice/'.$row->id.'" class="btn btn-info">View Service</a></td>
    </tr>';
    }
	  ?>  
   </tbody>
  </section>
    
</div>

	<?php //include('footer.php'); ?>

</div>




<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_id').dataTable();
    });
</script>
</body>
</html>