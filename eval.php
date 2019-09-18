
<!DOCTYPE html>
<html>
  <head>
    <title>Project Evaluations</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="code.js"></script>
  </head>

  <body>

    <?php
	include "functions.php";
	session_start();

	if(isset($_POST))
	{
	}
    ?>

    <script>
	function printValue(val, val2)
	{
		document.getElementById(val2).innerHTML = val;
	}

    </script>

    <?php
        $db = new PDO("sqlite:rubric.db");
        $sql = "SELECT * FROM rubric ORDER BY category";
        $stmt = $db->query($sql);
        $rubrics = $stmt->fetchall(PDO::FETCH_ASSOC);

	print"<table><th>";
	echo $_GET['cat'];
	$cat = $_GET['cat'];
	print"</th>";

	$eval = array("cat"=>$cat);

	print"<form method='post' action='index.php'>";
	foreach($rubrics as $rubric)
	{
		$category = $rubric['category'];
                $zero = $rubric['zero'];
                $one = $rubric['one'];
                $two = $rubric['two'];
                $three = $rubric['three'];
		$value = $rubric['num'];
			
		if(isset($_POST[$value]))
		{
			if($_POST[$value] == $rubric['zero'])
				$eval[$value] = 0;
			elseif($_POST[$value] == $rubric['one'])
				$eval[$value] = 1;
			elseif($_POST[$value] == $rubric['two'])
				$eval[$value] = 2;
			elseif($_POST[$value] == $rubric['three'])
				$eval[$value] = 3;
		}

		print"<tr><td>$category";
		print"<br><label>";
		print"<input type ='radio' name=$value value='$zero' onclick='printValue(this.value, this.name)'/>";
		print"0  </label><label>";
		print"<input type ='radio' name=$value value='$one' onclick='printValue(this.value, this.name)'/>";
        	print"1  </label><label>";
		print"<input type ='radio' name=$value value='$two' onclick='printValue(this.value, this.name)'/>";
	       	print"2  </label><label>";
		print"<input type ='radio' name=$value value='$three' onclick='printValue(this.value, this.name)'/>";
        	print"3  </label>";
		print"<p id=$value>Select a Grade to View Description.</p>";
		print"</td></tr>";
	}

	$_SESSION[$cat] = $eval;

	print"<br><tr><td><label>Comment(s)<input type=\"text\" name=\"email\" style=\"width:520px\" </label></td></tr>";
	//print"<tr><td><a href=\"http://csitrd.kutztown.edu/~mperr017/eval/\"><button type=\"button\" style=\"width:145px\">Submit</button><a></td></tr>";
	print"</table>";
	print"<br><br><input type='submit' value='Submit' name=$cat>";
	print"</table>";
	print"</form>";
	
    ?>
  </body>
</html>
