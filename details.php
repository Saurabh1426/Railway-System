<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","railway");
    if(!$conn)
	{  
		echo "<script type='text/javascript'>alert('Database failed');</script>";
        die('Could not connect: '.mysqli_connect_error());  
    }
	if (isset($_POST['submit']))
	{
	$detailsclass=$_POST['detailsclass'];
	$sql = "SELECT t_class FROM tickets WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$email=$_SESSION['user_info'];
	$query="UPDATE tickets SET t_no='$row[t_no]' WHERE email='$email';";
		if(mysqli_query($conn, $query))
	{  
		$message = "Ticket booked successfully";
	}
	else 
	{
		$message="Transaction failed";
	}
	if($message=="Ticket booked successfully")
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:index.php');
	}
	else
	{
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var clas=document.getElementById("detailsclass");
            var dat=document.getElementById("detailsdate"); 
			if(clas.selectedIndex==0)
			{
				alert("Please select your class");
				clas.focus();
				return false;		
			}
            if(dat.selectedIndex==0)
			{
				alert("Please select your Date for Travelling");
				dat.focus();
				return false;		
			}
            else
			{
				if(dat.selectedIndex>date("Y/m/d"))
				{
					continue;
				}
			}
		}
	</script>
</head>
<body>
        <?php
            include('header.php');
        ?>
        <div id="details">
	    <h1 align="center" id="detailstext">Choose The Services</h1><br/><br/>
        <form method="post" name="detailsform" onsubmit="return validate()">
        <h4 align="center">
        <select id="detailsclass" name="detailsclass" required>
        <option selected disabled>-------------------Select Class Here----------------------</option>
        <option value="sleeper">All Classes</option>
        <option value="sleeper">Slepper Class(SL)</option>
        <option value="sleeper">AC First Class(1A)</option>
        <option value="sleeper">First Class(FC)</option>
        <option value="sleeper">AC 2 Tier(2A)</option>
        <option value="sleeper">Exec.Chair Car(C)</option>
        <option value="sleeper">AC 3 Tier(3A)</option>
        <option value="sleeper">AC 3 Economy (3E)</option>
        </select>
   
        
        
        
        
        </br></br></br></br>

        

		<input type="submit" name="submit" id="submit" class="button" />
        </h4>
        </form>
        
	</div>
</body>
</html>