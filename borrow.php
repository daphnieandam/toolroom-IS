<?php
    session_start();
include("connection.php");

function loadtools($db){  
    $output = "";
    $tools = "select * from tools;";
    $query = mysqli_query($db, $tools);

    while($row = mysqli_fetch_assoc($query)){
        $output .= '<option value="'.$row["tool_id"].'">'.$row["toolname"].'</option>';
    }
    return $output;
}
    

if(isset($_POST['submit'])){
        
        
        $borrower = $_POST['borrower'];
        $tools = $_POST['tools'];
        $quantity = $_POST['quantity'];
        $transaction = array();
        $query = "";

        $sql = "INSERT INTO `transaction` (`borrower`) VALUES ($borrower);";
        $result = mysqli_query($db, $sql);

        if($result == true){
            $sql1 = "SELECT transaction_id FROM transaction ORDER BY transaction_id DESC";
            $result1 = mysqli_query($db, $sql1);
            $row = mysqli_fetch_array($result1);
            for($i=0; $i < count($_POST['tools']); $i++){
                $transaction[] = $row['transaction_id'];
            }
            for($j=0; $j< count($_POST['tools']);$j++){
                $tool_id = mysqli_real_escape_string($db, $tools[$j]); 
                $qty = mysqli_real_escape_string($db, $quantity[$j]); 

                $sql2 = "SELECT quantity FROM tools WHERE tool_id='$tool_id'";
                $result2 = mysqli_query($db, $sql2);
                $qty1 = mysqli_fetch_array($result2);
                $newqty = $qty1['quantity'] - $qty;
                $sql3 = "UPDATE tools SET quantity=$newqty WHERE tool_id='$tool_id'";
                $result2 = mysqli_query($db, $sql3);
            }
            for($num=0; $num<count($_POST['tools']); $num++){
                $tools1 = mysqli_real_escape_string($db, $tools[$num]);
                $quantity1 = mysqli_real_escape_string($db, $quantity[$num]);
                $transaction1 = mysqli_real_escape_string($db, $transaction[$num]);

                $query .= "INSERT INTO borrowed_tools(transaction_id,tools,quantity) VALUES($transaction1,$tools1,$quantity1);";
            }

            if($query != ""){
                if(mysqli_multi_query($db, $query)){
                     echo "<script>
					 if(msg == true || msg == false){
                        header('Location: borrowerview.php');
                    }</script>";
                }else{
                     echo "<script>var msg = confirm('Something went wrong!');
                    if(msg == true || msg == false){
                        location.href='borrow.php';
                    }
            </script>";
                }


        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>toolroom</title>
	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="jquery/add.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="icon/toolroom.png" />
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background-image: url(img/jj.png);
			color: white;
			width: 100%;
		}
	</style>
</head>

<body><br>
<div class="col">
  <div class="col-lg">
	<nav class="navbar navbar-expand-lg" style="background-color: #CC7722; border-radius: 5px">
		<img src="icon/toolroom.png" width="30" height="30" alt="img/11.jpg"/>&nbsp;&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active" style="color: white;>
						<ul class="navbar-nav mr-auto" >
					<li class="nav-item active">
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="tools">Tools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="students/instructor">Borrowers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrowerview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="transaction"><b>| Borrow |</b></a>
					</li>
										<li class="nav-item">
						<a class="nav-link" href="penaltyview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="charged">Penalty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="records.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="records" >Records</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="termsconditions.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="terms">Terms & Conditions</a>
					</li>
				</ul>
				<nav class="nav-inline my-2 my-lg-0">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
								profile
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="admin.php" >admin</a>
								<a class="dropdown-item" href="logout.php">logout</a>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	</nav>
<br/>
<div class="container">             
 <div class="container-fluid">
            <form  method="post" enctype="multipart/form-data">
            <div style="text-align:center" class="col-sm-3 col-sm-offset-2">  
            </div>
                <div class="w-100">
                    <div class="form-group w-50" style="width:300px;">
                    <?php
                        $borrower = "SELECT * FROM `borrower` "; 
                        $query = mysqli_query($db, $borrower);
                    ?>
                            <label form="borrower">students / instructor</label>
                            <select class="form-control" name="borrower" placeholder="Name" autofocus required>
                                    <option selected></option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['stud_id']; ?>"> <?php echo ucfirst($row['lastname'].", ".$row['firstname'])?> </option>
                                        <?php } ?>
                            </select>
                        </div><div class="table-responsive">
                                <table class="table w-100 table-bordered" id="tools">
                                    <tr><td>
                                     <div class="col-sm-12">
                                     <div class="form-group">
                                            <?php
                                                $tools = "select * from tools";
                                                $query = mysqli_query($db, $tools);
                                            ?>
                                    <label for="tools">toolname </label>
                                         <select class="form-control" id="tools1" name="tools[]" placeholder="Name" autofocus required>
                                            <option selected></option>                                           
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                        <option value="<?php echo $row['tool_id']; ?>"> <?php echo ucfirst($row[1] )?> </option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div></td>
                                        <td>
                                     <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="quantity">quantity</label>
                                            <input type="number" class="form-control text-field" id="quantity1" name="quantity[]" placeholder="Quantity">
                                        </div>
                                    </div></td>
                                </tr>
                                    </table>
                            <button type="submit" name="submit" class="btn btn-outline-warning btn-block-sm">Save</button>
                            <button type="button" class="add btn btn-outline-warning btn-block-sm">+</button>

                 
                  

             </div>
         </div>
         </form>
</div>
</div>
<script>
        $(document).ready(function(){
            var count = 1;
            $(document).on('click','.add', function(){
                count += 1;
                var html_code = ''; 
                html_code += '<tr id="row_id_'+count+'">';
                html_code += '<td> <div class="col-sm-12"><div class="form-group"><label form="borrower"> toolname</label><select  class="form-control" name="tools[]"  autofocus required id="tools'+count+'"><option selected></option><?php echo loadtools($db); ?></select></div></div></td>';
                html_code += '<td><div class="col-sm-7"><div class="form-group"><label for="quantity">quantity</label><input type="number" name="quantity[]" min="1" id="quantity'+count+'" data-srno="'+count+'" placeholder="Quantity"  class="form-control form-control-sm nput-sm quantity" /></div></div</td>';
                html_code += '<td><button type="button" id="'+count+'" class="btn btn-sm btn-outline-warning remove">-</button></tr>';
                $("#tools").append(html_code);
            });
      

  $(document).on('click','.remove',function(){
    var row_id = $(this).attr("id");
        $('#row_id_'+row_id).remove();
    count -= 1;
  });


});</script>
</body>
</html>