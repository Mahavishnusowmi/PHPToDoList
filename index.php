<?php
include "config.php";

if(isset($_POST["insert"])){
    $sql= "insert into todo_list(title) values('{$_POST["text"]}')";
    $db->query($sql);
    echo "<p class='success'>Message Sended</p>";
}

if(isset($_GET["delete"])){
$sql="delete from todo_list where id={$_GET["delete"]}";
$db->query($sql);
echo "<p class='success'>Message Deleted</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPToDoList</title>
    <Style>        
		body{width:80%;margin:auto;font-family:arial;}
		.container{margin-top:5rem;}
		.header h1,.header h1 a,.content{text-align:center;text-decoration:none;}
		input{width:82%;height:2.5rem;float:left;}
		button{width:16%;height:3rem;float:right;}      
		.row_data{width:91%;}
		.row_data td{border:1px solid #ddd;padding:8px;}
		.row_data tr:nth-child(odd){background-color:#f2f2f2;}
        .success{
            background:green;
            color:white;
            line-height:30px;
            border-radius:5px;
            height:30px;
            text-align:center;
            margin-bottom:10px;
        }
        .btn,.btn:link,.btn:visited {
        text-transform: uppercase;
        text-decoration: none;
        display: inline-block;
        border-radius: 5rem;
        transition: all .2s;
        position: relative;
		font-size: 1rem;
		margin-bottom: 2px;

        /* Change for the <button> element */
        border: none;
        cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 1rem 2rem rgba(#000,.2);
        }
    </Style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><a href="index.php">PHPToDoList</a></h1>
        </div>
        <div class="content">
            <form action="index.php" method="post">
                        <input type="text"name="text" placeholder="Save your Message" required>
                        <button type="submit" class="btn" name="insert">Submit</button>
            </form>
            <div>
				<?php
				$sql="select * from todo_list order by id desc";
                $res=$db ->query($sql);
               if($res->num_rows>0){
				?>
				<table class="row_data">
					<?php
 				while($row=$res->fetch_assoc()){
						?>
						<tr>
							<td width="92%"><?php echo $row['title']?></td>
							<td><a href="index.php?delete=<?php echo $row['id']?>">Delete</a></td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php }else { 
					echo "No message found";
				} ?>
            </div>
        </div>
    </div>    
</body>
</html>