<!DOCTYPE html>

<?php

 $dsn = 'mysql:host=localhost;dbname=blogphp';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}
 $sql = "SELECT * FROM article where status = 0";
// $sql = "SELECT * FROM article ";
$statement = $connection->prepare($sql);
$statement->execute();
 $articles  = $statement->fetchAll(PDO::FETCH_OBJ);

 ?>


<html lang="en">

<head>
<style>

.text-card:hover{
  text-decoration: none;
}
p:hover{
  text-decoration: none;
}
h3:hover{
  text-decoration: none;
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
    
    <section class="mb-5">
	<div id="carousel-3" class="carousel slide" data-ride="carousel">
       
        <ol class="carousel-indicators">
          <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-3" data-slide-to="1"></li>
          <li data-target="#carousel-3" data-slide-to="2"></li>
          <li data-target="#carousel-3" data-slide-to="3"></li>
          <li data-target="#carousel-3" data-slide-to="4"></li>
          <li data-target="#carousel-3" data-slide-to="5"></li>
          <li data-target="#carousel-3" data-slide-to="6"></li>
          <li data-target="#carousel-3" data-slide-to="7"></li>
          <li data-target="#carousel-3" data-slide-to="8"></li>
          <li data-target="#carousel-3" data-slide-to="9"></li>
          <li data-target="#carousel-3" data-slide-to="10"></li>
          
        </ol>
       
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=234" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=445" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=435" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=425" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=426" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=427" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=428" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=429" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=430" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=431" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=432" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=433" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=434" alt="Slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>TRAVEL BAG LIFE</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
            </div>
          </div>
       

        </div><!-- e carousel-inner -->
        
        <a class="carousel-control-prev" href="#carousel-3" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">prev</span>
        </a>
        
        <a class="carousel-control-next" href="#carousel-3" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">next</span>
        </a>
        
	</div><!-- e carousel -->
</section><!-- e section -->

  <!-- Swiper JS -->
    
<!-- 		
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
  </div> -->

  <div class="container">
      <div class="row mt-5 mb-5 mx-5 justify-content-center">


<?php foreach($articles as $article): ?>
  
                


    
<div class="col-md-3 col-sm-6 item mb-3">
<a  href="article_a_.php?id_article=<?= $article->id_article ?>" >
    <div class="card item-card card-block px-2 py-2">
    
        <img  class="img w-100" src="trait_article\articles_image\<?= $article->image; ?>"  alt="Photo of sunset">
        <h5 class="item-card-title mt-3 mb-3 text-card" style="text-decoration:none"><?= $article->titre_article; ?></h5>
        <p class="card-text  text-card" style="text-decoration:none"><?= substr($article->contenu_article,0,60); ?> ...</p> 
        <?php 
			 $categorie_id = $article->id_categories;
			 $sql3 = "SELECT name,categories.image ,categories.id_categories FROM categories INNER JOIN article ON categories.id_categories = article.id_categories WHERE article.id_categories = $categorie_id";
             $statement3 = $connection->prepare($sql3);
             $statement3->execute();
           $table3 = $statement3->fetch(PDO::FETCH_OBJ);
		   ?>
        
     </div>
     </a>
   </div>

                    


  <?php endforeach; ?>
                    
                    
  
            </div>
            <nav aria-label="Page navigation example justify-content-center">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
        </div>
        

    </div>





    <?php include 'js.php';?>

</body>

</html>