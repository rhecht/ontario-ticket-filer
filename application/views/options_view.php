<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css" media="screen">
	label{display:block;}
</style>
</head>

<body>

<h1>Create</h1>
<?php echo form_open('site/create');?>

<p>
	<label for="title">Title</label>
    <input type="text" name="title" id="title" />
</p>

<p>
	<label for="content">Content</label>
    <input type="text" name="content" id="content" />
</p>

<p>
	<input type="submit" value="submit" />
</p>


<?php echo form_close(); ?>

<hr />

<h2>Read</h2>

<?php if(isset($records)):foreach($records as $row): ?>
	<h2><?php echo $row->site_title; ?></h2>
	<div><?php echo $row->site_content; ?></div>
    <div>Date Deleted: <?php echo $row->date_deleted; ?></div>
    <?php echo anchor("site/delete/" . $row->site_id, "Delete Now");  ?>
    <?php endforeach; ?>
<?php else: ?>
<h2>No records were returned</h2>
<?php endif; ?>

<hr />

<h2>Delete</h2>

<p>To sample the delete method, simply click on the heading and it will run.</p>

</body>
</html>