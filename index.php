<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Capstone Evaluation</title>
    <script src="code.js"></script>
  </head>
  <body>
<?php
	session_start();

	if (isset($_SESSION))
	{
		print"<nav>";
		print"<a href=\"log_out.php\">Log Out</a>";
		print" ";
		print"<a href=\"rubric.php\">Rubric</a>";
		print"</nav>";
	}
	else
	{
		print"<nav>";
		print"<a href=\"sign_in.php\">Sign In</a>";
		print" ";
		print"<a href=\"rubric.php\">Rubric</a>";
		print"</nav>";
	}
	
?>

<h1>Projects</h1>

<?php
	error_reporting(0);
	print"<table><tr><th>Projects</th><th>Status</th></tr>";

        $db = new PDO("sqlite:rubric.db");
        $sql = "SELECT * FROM proj_name ASC";
        $stmt = $db->query($sql);
	$names = $stmt->fetchall(PDO::FETCH_ASSOC);

	print"<form action='eval.php' method='post'>";
	foreach($names as $name)
	{
		$group = $name['group_name'];
		print"<tr><td><a href=\"http://csitrd.kutztown.edu/~mperr017/eval/eval.php?cat=$group\"><button type=\"button\" style=\"width:145px\">$group</button><a></td>";
		if($_SESSION[$group])
		{
			print"<td>Complete</td></tr>";
		}
		else
			print"<td></td></tr>";
	}
	print"<form>";
?>	

  </body>
</html>




