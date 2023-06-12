<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css1/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<div class="wrapper"> 
   <div class="homeone"> 
      <div class="feature">
        
         <div class="text">Скидки -6% на все букеты по предзаказу на 8 марта</div></a>
      </div>
      
      <div class="special"><a href="quick_view.html">
         <div class="text">Розы</div></a>
      </div>
      <div class="amasing">
         <a href="quick_view.html">
         <div class="text">Пряники</div></a>
      </div>
      <div class="news">
         <a href="quick_view.html">
         <div class="text">Подарочные корзины</div></a>
      </div>
      <div class="photos">
         <a href="quick_view.html">
         <div class="text">Цветы в коробке</div>
      </div></a>
   </div>
</div>

<section class="category">

   <h1 class="title">наше производство</h1>

   <div class="box-container">

      <a href="category.html" class="box">
         <img src="images/cake.svg" alt="">
         <h3 class="black">торты</h3>
      </a>
   
      <a href="category.html" class="box">
         <img src="images/prana.svg" alt="">
         <h3>пряники</h3>
      </a>
   
      <a href="category.html" class="box">
         <img src="images/flower.svg" alt="">
         <h3>зефирные букеты</h3>
      </a>
   
      <a href="category.html" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>капкейки</h3>
      </a>

   </div>

</section>



<section class="products">

<h1 class="title">Каталог</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
         <div class="price"><?= $fetch_products['price']; ?><span> рублей</span></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.html" class="btn">Показать все</a>
   </div>

</section>


















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- <script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script> -->

</body>
</html>