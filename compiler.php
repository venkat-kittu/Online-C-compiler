<?php
	$text="Enter your program here";
	if(isset($_POST["compile"]))
	{
		$text=$_POST["code"];
		$file=fopen("x.c","w") or die("error opening file");
		fwrite($file,$text);
		passthru("gcc x.c",$i);
		if(!$i)
		{
			echo "<h3>compiled</h3>";
			#echo $i;
			echo "<br />";
			exec("a",$out1);
			$len=count($out1);
			for($i=0;$i<$len;$i++)
			{
				echo $out1[$i];
			}
		}
		else
		{
			echo "<h3>Not compiled </h3> ";
			$err=shell_exec("gcc x.c 2>&1");
			echo "<br />";
			echo json_encode($err);
		}
	}
	?>
<html>
	<head><title>Compiler</title></head>
	<body>
		<div align="center" ><h1>C-Compiler</h1></div>
		<div>
			<form method="post">
				<textarea name="code" id='code' rows="20" cols="150" ><?php echo htmlspecialchars($text); ?> </textarea/><br />
				<input type="submit" name="compile" value ="compile" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</form>
		</div>

	</body>
</html>
