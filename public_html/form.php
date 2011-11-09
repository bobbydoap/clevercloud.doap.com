<?php
//set connection to database
$con = mysql_connect("localhost","root","fr1ck0ff");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Set the active mySQL database
$db_selected = mysql_select_db('bobby', $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}
mysql_select_db(
if (isset($_GET[group_id]) && $_GET[group_id] != 0) {

$query = SELECT NI.departamento, NI.city, NI.address, NI.lat, NI.lon FROM bobby.NI WHERE departamento = 'managua' && city = 'managua' && address LIKE '%Colonia Independencia%'

?>
<html>
<head>
</head>
<body>
<form method=GET action="<?php echo $PHP_SELF;?>">
<select id=departamento>
<?php do { ?>
  <option value="<? echo $row_site_group['departamentos']; ?>" selected><? echo $row_site_group['departamentos']; ?></option>

  <option>Tea</option>
</select>
</body>
</html>
