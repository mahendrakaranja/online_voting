<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION ['userdata'] ['status']==0){
        $status = '<b style="color:red">Not Votes</b>';
    }
    else{
        $status = '<b style="color:green">Votes</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body style="background-color: green">
    <style>
        #backbtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #1e3799;
            color: #fff;
            float: left;
            margin: 10px;
        }

        #logoutbtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #1e3799;
            color: #fff;
            float: right;
            margin: 10px;

        }

        #Profile{
            background-color:#fff;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Group{
            background-color:#fff;
            width: 60%;
            padding: 20px;
            float: right;

        }

        #votebtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #1e3799;
            color: #fff;

        }

        #mainpanel{
            padding: 10px;

        }

        #voted{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: green;
            color: #fff;
            cursor: pointer;


        }
 
    </style>


    <div id="headerSection">
        <center>
        <div id="mainSection">
            <a href="../"><button id="backbtn">Back</button></a> 
            <a href="logout.php"><button id="logoutbtn">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>

        </center>
        
    </div> 
    <hr>

    <div id = "mainpanel">
        <div id="Profile">  
            <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height ="100" width="100"><br><br></center>
            <b>Name: </b> <?php echo  $userdata['name'] ?> <br><br>
            <b>Mobile: </b><?php echo  $userdata['mobile'] ?> <br><br> 
            <b>Address: </b> <?php echo  $userdata['address'] ?> <br><br> 
            <b>Status: </b> <?php echo  $status?> <br><br>     
        </div>
        <div id="Group">
            <?php
                if($_SESSION['groupsdata']){
                    for($i=0; $i<count($groupsdata); $i++){
                        ?>
                        <div>
                            <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height = '100' width = '100'>
                            <b>Group Name: </b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                            <b>Votes: </b> <?php echo $groupsdata[$i]['votes'] ?><br><br>

                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i] ['votes'] ?>" >
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i] ['id'] ?>" >
                                <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                           
    
                            </form>
                        </div>
                        <hr>   
                        <?php
                    }
    
                }
                else{
                    echo "Their is not connected the container";
    
                }
            ?>
    
        </div>

    </div>   

</body>
</html>
