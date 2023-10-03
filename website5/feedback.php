<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbContent.php';
	
	if(isset($_POST['btnsave']))
	{
		$name = $_POST['cusName'];
		$email = $_POST['email'];
		$number = $_POST['mobile'];
		$clean = $_POST['clean'];
		$variety = $_POST['variety'];
		$quality = $_POST['quality'];
		$staff = $_POST['staff'];
		$attentive = $_POST['attentive'];
		$friendliness = $_POST['friendliness'];
		$product = $_POST['product'];
		$overall = $_POST['overall'];
		$waiting = $_POST['waiting'];
		$comment = $_POST['comment'];
		
		
		if(empty($name)){
			$errMSG = "Please Enter Mobile Model.";
		}
		else if(empty($email)){
			$errMSG = "Please Enter Your Email ID.";
		}
		else if(empty($number)){
			$errMSG = "Please Enter Number.";
		}
		else if(empty($clean)){
			$errMSG = "Please Select your rating";
		}
		else if(empty($variety)){
			$errMSG = "Please Enter variety.";
		}
		else if(empty($quality)){
			$errMSG = "Please Enter quality.";
		}
		else if(empty($staff)){
			$errMSG = "Please staff.";
		}
		else if(empty($attentive)){
			$errMSG = "Please Enter attentive.";
		}
		else if(empty($friendliness)){
			$errMSG = "Please Enter friendliness.";
		}
		else if(empty($product)){
			$errMSG = "Please product.";
		}
		else if(empty($overall)){
			$errMSG = "Please Enter overall.";
		}
		else if(empty($waiting)){
			$errMSG = "Please Enter waiting.";
		}
		else if(empty($comment)){
			$errMSG = "Please Select comment.";
		}
		
	
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO feedback(name,email,number,clean,variety,quality,staff,attentive,friendliness,product,overall,waiting,comment) VALUES(:uname,:uemail, :unumber,:uclean,:uvariety,:uquality,:ustaff,:uattentive,:ufriendliness,:uproduct,:uoverall,:uwaiting,:ucomment)');
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':uemail',$email);
			$stmt->bindParam(':unumber',$number);
			$stmt->bindParam(':uclean',$clean);
			$stmt->bindParam(':uvariety',$variety);
			$stmt->bindParam(':uquality',$quality);
			$stmt->bindParam(':ustaff',$staff);
			$stmt->bindParam(':uattentive',$attentive);
			$stmt->bindParam(':ufriendliness',$friendliness);
			$stmt->bindParam(':uproduct',$product);
			$stmt->bindParam(':uoverall',$overall);
			$stmt->bindParam(':uwaiting',$waiting);
			$stmt->bindParam(':ucomment',$comment);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/inserttab.css">
</head>

<body>

<div class="container">
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
	<div class="logo"><a href="#"><img src="images/logo.jpeg"></a></div>
	<h2>Customer Feedback</h2>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
	 <div class="tab">   
	<table class="table table-bordered table-responsive">
		
	
    <tr>
    	<td width="45%"><label class="control-label">Customer Name</label></td>
        <td><input class="form-control" type="text" name="cusName" placeholder="Enter your name" value="<?php echo $name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Customer Email ID</label></td>
        <td><input class="form-control" type="text" name="email" placeholder="Enter your Email ID" value="<?php echo $email; ?>" /></td>
    </tr>
		    <tr>
    	<td><label class="control-label">Customer Mobile Number</label></td>
        <td><input class="form-control" type="text" name="mobile" placeholder="Enter your Mobile number" value="<?php echo $number; ?>" /></td>
    </tr>
  <tr><td bgcolor="#620151"><h5>RATE FROM 0-5</h5></td><td bgcolor="#620151"><h5>1</h5><h5>2</h5><h5>3</h5><h5>4</h5><h5>5</h5></td></tr>
		<tr> 
			<td height="50px"><label class="control-label">Store Cleanliness</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="clean" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="clean" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="clean" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="clean" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="clean" value="5"><span class="select"></span>
      </label>
      
    </form>
				
			</td>
   </tr>
		<tr> 
			<td height="50px"><label class="control-label">Product Variety</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="variety" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="variety" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="variety" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="variety" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="variety" value="5"><span class="select"></span>
      </label>
      
    </form>
				
			</td>
   </tr>
		<tr> 
			<td height="50px"><label class="control-label">Product Quality</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="quality" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="quality" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="quality" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="quality" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="quality" value="5"><span class="select"></span>
      </label>
      
    </form>
				
			</td>
   </tr>
		
		<tr> 
			<td height="50px"><label class="control-label">Staff Appearance(Uniform/grooming)</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="staff" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="staff" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="staff" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="staff" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="staff" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
		
		<tr> 
			<td height="50px"><label class="control-label">Attentiveness of Staff</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="attentive" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="attentive" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="attentive" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="attentive" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="attentive" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
    
			<tr> 
			<td height="50px"><label class="control-label">Friendliness of Staff</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="friendliness" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="friendliness" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="friendliness" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="friendliness" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="friendliness" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
		<tr> 
			<td height="50px"><label class="control-label">Product Knowledge</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="product" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="product" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="product" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="product" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="product" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
		<tr> 
			<td height="50px"><label class="control-label">Time Manage</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="waiting" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="waiting" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="waiting" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="waiting" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="waiting" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
		<tr> 
			<td height="50px"><label class="control-label">Overall Rating</label></td>
			<td>
    <form action="" method="post" class="mb-2">
      <label>
        <input type="radio" name="overall" value="1"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="overall" value="2"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="overall" value="3"><span class="select"></span>
      </label>
      <label>
        <input type="radio" name="overall" value="4"><span class="select"></span>
      </label>
		<label>
        <input type="radio" name="overall" value="5"><span class="select"></span>
      </label>
    </form>	
			</td>
   </tr>
		<tr>
    	<td><label class="control-label">Comment</label></td>
        <td><input class="form-control" type="text" name="comment" placeholder="Please leave your comments" value="<?php echo $comment; ?>" /></td>
    </tr>
		
    <tr>
        <td colspan="2" height="70px"><button type="submit" name="btnsave" class="btn btn-block" ><h3>Submit</h3>
        </button>
        </td>
    </tr>
    
    </table>
    </div>
</form>

</div>

</body>
</html>