<?php 

 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$db = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}





session_start();
if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM auteur WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location:index.php");
        }
    }
}
?>







        <html lang="en">

<head>
<head>
<style>

/* Blur-zoom Container */
.img-hover-zoom--blur img {
  transition: transform 1s, filter 2s ease-in-out;
 
  
}

/* The Transformation */
.img-hover-zoom--blur:hover img {
  filter: blur(0);
  transform: scale(1.1);
}
.btn-outline-primary  {
  margin:0px 0px 0px 0px;
}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLOG PHP</title>

   

   
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <?php include 'linkbootsrap.php';  ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link href="css/css1.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex" id="wrapper">

    <?php
	
	
  
        include 'asidebar.php';
       
	
?>
<div id="page-content-wrapper">
<?php





if(isset($_SESSION["user"]) && $_SESSION["user"]["role"]== 1){
  include 'navbar2.php';
}



else{
  include 'navbar.php';
}


         
         ?>
		
		<!-- <div class="card">
  <div class="card-body shadow rounded">
   	<div class="view intro-2 shadow-lg">
      <div class="full-bg-img">
        <div class="mask rgba-black-strong flex-center">
        <div class="container ">
          <div class="white-text text-center wow fadeInUp">
         
            <img src="img/logo_blog2.png" alt="" class="opacity-70">
            
            <br>
            <h5>Bonjour à toutes et à tous et bienvenue sur mon blog !  </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div> -->
  
            
<div class="col-md-6 mx-auto my-5">

<div class="card rounded shadows">
  <div class="card-body">

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username or Email</label>
                <input class="form-control" type="text" name="username" placeholder="Username or email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Login" />

        </form>
            
         <a href="register.php"  class="btn btn-danger btn-block"  >  Register </a>
         </div>
        </div>

        </div>
        </div>

 
 
 
                    
                    

            </div>
        </div>
        

    </div>

 




    <?php include 'js.php';?>

</body>

</html>


