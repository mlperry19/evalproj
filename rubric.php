<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Capstone Evaluation</title>
  </head>
  <body>
<?php
	session_start();

	if (isset($_SESSION['username']))
	{
		print"<nav>";
		print"<a href=\"log_out.php\">Log Out</a>";
		print" ";
		print"<a href=\"index.php\">Home</a>";
		print"</nav>";
	}
	else
	{
		print"<nav>";
		print"<a href=\"sign_in.php\">Sign In</a>";
		print" ";
		print"<a href=\"index.php\">Home</a>";
		print"</nav>";
	}
	
?>

<h1>Rubric</h1>
	
<?php
	$db = new PDO("sqlite:rubric.db");
	$sql = "SELECT * FROM rubric ORDER BY category";
	$stmt = $db->query($sql);
	$rubrics = $stmt->fetchall(PDO::FETCH_ASSOC);
	
	print "<table>\n<tr><th>Category</th><th>0</th><th>1</th><th>2</th><th>3</th><th>SE Only</th></tr>\n";
	
	foreach($rubrics as $rubric)
	{
		$category = $rubric['category'];
		$zero = $rubric['zero'];
		$one = $rubric['one'];
		$two = $rubric['two'];
		$three = $rubric['three'];
		$se = $rubric['se'];
		print "<tr>";
		print "<td>$category</td>";
		print "<td>$zero</td>";
		print "<td>$one</td>";
		print "<td>$two</td>";
		print "<td>$three</td>";
		print "<td>$se</td>";		
	}
	
	print"</table>";
?>
  </body>
</html>




