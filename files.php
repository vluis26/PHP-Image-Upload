<?php include 'process.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"> </div>
				<div class="list-group list-group-flush">
					<a href="upload.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
					<a href="files.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-folder-open"></i> Files</a>
					<a href="logout.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
				</div>
			</div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-dark" id="menu-toggle">Toggle Menu</button>
			</nav>

			<div class="container">
				<h1 class="mt-4"></h1>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<th scope="col" width="20%">Filename</th>
								<th scope="col">Size</th>
								<th scope="col">Category</th>
								<th scope="col">Description</th>
								<th scope="col">Downloads</th>
								<th scope="col">Action</th>
							</thead>
							<tbody>		
							<?php foreach ($files as $file): ?>
								<tr>
									<td data-label="Filename"><?php echo $file['name']; ?></td>
									<td data-label="Size"><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
									<td data-label="Category"><?php echo $file['category']; ?></td>
									<td data-label="Description"><?php echo $file['description']; ?></td>
									<td data-label="Downloads"><?php echo $file['downloads']; ?></td>
									<td data-label="Action"><a href="files.php?file_id=<?php echo $file['id'] ?>" class="btn btn-dark"><i class="fa fa-download" aria-hidden="true"></i> </a>&nbsp;<a href="files.php?delete_id=<?php echo $file['id'] ?>" class="btn btn-danger" d><i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>
								</tr>
							<?php endforeach;?>
						</table>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		<!-- /#wrapper -->

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		});
	</script>

	
	<!-- Modal Confirm HTML -->
	<div id="confirm" class="modal fade">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header" style="background: #eea236;">
					<div class="icon-box">
						<i class="material-icons">priority_high</i>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body text-center">
					<h4>Confirm?</h4>	
					<p>Are you sure you want to delete this?<br>This process can't be undone.</p>
					<button class="btn btn-danger" data-dismiss="modal"><span>Cancel</span></button>&nbsp;
					<a href="files.php?delete_id=<?php echo $file['id'] ?>"><button class="btn btn-dark"><span>Confirm</span></button></a>
				</div>
			</div>
		</div>
	</div>    
</body>
</html>
