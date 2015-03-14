<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Time Capsule</title>
	</head>
<body>
	<div id="logout" align="right"><a href="home/logout">Logout</a></div>
	<h1>Home</h1>
	<h2>Welcome <?php echo $username; ?></h2>
	
	
	<div id="create_capsule" >
	<h2>Create a New Time Capsule</h2>
	<?php echo validation_errors(); ?>	
	<?php echo $error; ?>
	
	<?php echo form_open_multipart('verifycapsule'); ?>
		<label for="capsule_name">Capsule Name:</label></br>
		<input id="capsule_name" name="capsule_name" type="text" size="30">
		
		</br></br>
		<label for="unlock">Unlock Date</label></br>
		<input id="unlock" type="date" name="unlock_date">
		</br></br></br>
		
		
		Upload Capsule Items:
		</br></br>
		<div id="item">
			<input id="capsule_item" name="capsule_item" type="file" size="30">
		</div>
		
		</br></br>
		<input type="submit" value="Create New Capsule"/> 
	</form>
	</div>
	
	<div id="display_capsules">
	<h2>Time Capsules available to view</h2>
		<?php echo '<ul>'; ?>
		<?php foreach($unlocked as $capsule): ?>
		<?php echo '<li>'; ?>
		<a href="<?php echo site_url('home/download_item/'.$capsule->capsule_id) ?>">Download Capsule</a>
		<?php echo $capsule->capsule_name . ' is unlocked on: ' . $capsule->ts_unlock; ?>
			<?php echo '<ul>'; ?>
			<?php foreach($capsule->items as $item): ?>			
			<?php echo '<li>' . $item['item_name'] . '</li>' ; ?>
			<?php endforeach; ?>
			<?php echo '</ul>'; ?>
		<?php echo '</li></br>'; ?>
		<?php endforeach; ?>
		<?php echo '</ul>'; ?>
	</div>
	
</body>





<script type='text/javascript' src="<?php echo base_url(); ?>libraries/capsuleaddition.js"></script>
</html>


