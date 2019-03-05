<?php
  session_start();
	include_once '../pro/classes/user.php';
	$user = new User();
	 $id = $_SESSION['uid'];
	if (!$user->get_session()){
	 header("location:../pro/login.php");
	 exit();
	}
?>





<!DOCTYPE html>
<html>
<head>
	<title>Employee Data</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">
  <style>

  body {
    font-family: "Lato", sans-serif;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  #main {
    transition: margin-left .5s;
    padding: 16px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  </style>

</head>
<body>
  <div class="sidenav" id="mySidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <a href="user_profile.php"><i class="fa fa-fw fa-user"></i>User Profile</a>
    <a href="../datatable/index.php"><i class="fa fa-fw fa-user"></i> Employee Data</a>
    <a href="include/changePass.php"><i class="fa fa-trash-o fa-lg"></i> Change Password</a>
    <a href="home.php?q=logout"><i class="fa fa-fw fa-lock"></i> LogOut</a>

  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  </div>
  <div class="main">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">


    <div class="collapse navbar-collapse col-xs-3 col-xs-offset-9 " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto  ">



    </div>
  </nav>

<a href="../pro/home.php"><span>&#8592;</span> Back</a>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">Employee Data </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add Member
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageMemberTable">
					<thead>
						<tr>
							<th>S.no</th>
				       <th>Name<th>

						 	<th>Contact</th>
							<th>Active</th>
							<th>Option</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add Member</h4>
	      </div>

	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!-- addclass has-error will appear -->
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
				<!-- here the text will apper  -->
			    </div>
			  </div>
				<div class="form-group">
				  <label for="address" class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
				  <select class="form-control" name="address" id="address">

				  <option value="">----Select-----</option>
				  <option value="Andhra Pradesh">Andhra Pradesh</option>
				  <option value="Assam">Assam</option>
				  <option value="Bihar">Bihar</option>
				  <option value="Chhatisgarh">Chhatisgarh</option>
				  <option value="Goa">Goa</option>
				  <option value="Gujrat">Gujrat</option>
				  <option value="Haryana">Haryana</option>
				  <option value="Himachal Pradesh">Himachal Pradesh</option>
				  <option value="Jammu & Kashmir">Jammu & Kashmir</option>
				  <option value="Jharkhand">Jharkhand</option>
				  <option value="Karnataka">Karnataka</option>
				  <option value="Kerala">Kerala</option>
				  <option value="Madhya Pradesh">Madhya Pradesh</option>
				  <option value="Maharashtra">Maharashtra</option>
				 <option value="Manipur">Manipur</option>
				 <option value="Meghalaya">Meghalaya</option>
				 <option value="Manipur">Manipur</option>
				 <option value="Mizoram">Mizoram</option>
				 <option value="Punjab">Punjab</option>
				 <option value="Rajasthan">Rajasthan</option>
				<option value="Telangana">Telangana</option>
				<option value="Uttar Pradesh">Uttar Pradesh</option>
				<option value="Uttarakhand">Uttarakhand</option>
			</select>
				</div>
			</div>

			  <div class="form-group">
			    <label for="contact" class="col-sm-2 control-label">Contact</label>
			    <div class="col-sm-10">
						<input type="text" class="form-control" id="contact" name="contact" placeholder="contact number" pattern="[7-9]{1}[0-9]{9}" autocomplete="off"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength = "10"/>
			    </div>
			  </div>


			  <div class="form-group">
			    <label for="active" class="col-sm-2 control-label">Active</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="active" id="active">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Activate</option>
			      	<option value="2">Deactivate</option>
			      </select>
			    </div>
			  </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Member</h4>
	      </div>
	      <div class="modal-body">
	        <p>Do you really want to remove ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Member</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">

	      <div class="modal-body">

	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editName" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editName" name="editName" placeholder="Name">
				<!-- here the text will apper  -->
			    </div>
			  </div>

				<div class="form-group">
				  <label for="address" class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
				  <select class="form-control" name="editAddress" id="editAddress">
						<option value="">----Select-----</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chhatisgarh">Chhatisgarh</option>
						<option value="Goa">Goa</option>
						<option value="Gujrat">Gujrat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu & Kashmir">Jammu & Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
					 <option value="Manipur">Manipur</option>
					 <option value="Meghalaya">Meghalaya</option>
					 <option value="Manipur">Manipur</option>
					 <option value="Mizoram">Mizoram</option>
					 <option value="Punjab">Punjab</option>
					 <option value="Rajasthan">Rajasthan</option>
					<option value="Telangana">Telangana</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="Uttarakhand">Uttarakhand</option>
				</select>
				</div>
			</div>

			  <div class="form-group">
			    <label for="editContact" class="col-sm-2 control-label">Contact</label>
			    <div class="col-sm-10">
			  	<input type="text" class="form-control" id="editContact" name="editContact" placeholder="contact number" pattern="[7-9]{1}[0-9]{9}" autocomplete="off"
						oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
						maxlength = "10"/>
			    </div>
			  </div>


			  <div class="form-group">
			    <label for="editActive" class="col-sm-2 control-label">Active</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editActive" id="editActive">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Activate</option>
			      	<option value="2">Deactivate</option>
			      </select>
			    </div>
			  </div>
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>

	

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>
