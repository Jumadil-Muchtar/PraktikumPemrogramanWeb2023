<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Pilih Menu </h1>
    <?php
    session_start();
    $sudahAdmin = false;
    if(isset($_SESSION['verify'])){
        $verify = $_SESSION['verify'];
    }
    if($verify === true){
        
        $sudahAdmin = true;
        $_SESSION['verifyCRUD'] = $sudahAdmin;
        echo "<a href=insert.php><button>Insert Data</button></a>";
        echo "<a href=read.php><button>Read Data</button></a>";
        echo "<a href=update.php><button>Update Data</button></a>";
        echo "<a href=delete.php><button>Delete Data</button></a>";
    } else {
        header('Location: login.php'); 
        exit;
    }
    
    
    ?>
    

    
    <br>
<a href="login.php"><button>Logout</button></a>
</body>
</html>