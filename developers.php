<?php require_once('Connections/i.php'); ?>
<? if (!isset($HTTP_GET_VARS['specialty'])) { $HTTP_GET_VARS['specialty'] == "1"; } ?>
<? mysql_select_db($database_doap, $doap);
$query_websites = "select developers.dev_id, developers.name, developers.email, developers.portfolio from developers where developers.specialty = '$_GET[specialty]'"; 
$sites = mysql_query($query_websites, $doap) or die(mysql_error());
$row_sites = mysql_fetch_assoc($sites);
?>

<?php
$query_groups = "select distinct developers.specialty from developers";
$groups = mysql_query($query_groups, $doap) or die(mysql_error());
$row_groups = mysql_fetch_assoc($groups);
?>


<html>
<head>
</head>
<body>

<form method=GET action="<?php echo $PHP_SELF;?>">
Select a developer category.
<select name=group>
<?php do { ?>
<option value="<? echo $row_groups['specialty']; ?>"><? echo $row_groups['specialty']; ?></option>
<?php } while ($row_groups = mysql_fetch_assoc($groups)); ?>
</select>
<input type=submit value=Fetch>
</form>
<table border=0 cellspacing=5 cellpadding=5 width=800px>
<tr>
<td><h3>Name</h3></td>
<td><h3>Portfolio</h3></td>
<td><h3>Job Count</h3></td>
</tr>
<?php do { ?>
    <tr>
      <td valign=top nowrap><a href=<?php echo $row_sites['name']; ?> target=_NEW><?php echo $row_sites['name']; ?></a></td>
      <td valign=top nowrap><a href=<?php echo $row_sites['email']; ?> target=_NEW><?php echo $row_sites['email']; ?></a></td>
	<td><?php echo $row_sites['dev_id']; ?></td>
    </tr>
<?php } while ($row_sites = mysql_fetch_assoc($sites)); ?>
<?php mysql_free_result($sites); ?>
</body>
</html>
