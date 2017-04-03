<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
if ($DBConnect===FALSE)
	echo "<p> Connection failed </p>\n";
	else
	{
	$Result = @mysql_select_db("shoppingcart", $DBConnect);
	if ($Result === FALSE)
		echo "<p> Unable to select Database</p>";
}
	?>