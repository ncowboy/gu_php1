<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Интернет-магазин</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Shop</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse d-flex justify-content-end" id="navbarCollapse" style="">
      <ul class="navbar-nav bd-navbar-nav flex-row mr-5">
        <li class="nav-item">
          <a class="nav-link " href="/catalog">Каталог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/feedbacks">Отзывы</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mb-0 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search"
               aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <button class="btn btn-success ml-3" type="button"><i
            class="fas fa-shopping-cart"></i></button>
    </div>
  </nav>
  <div class="d-flex justify-content-end">
    <div class="cart-content">
      <!--        <div class="cart-item">-->
      <!--          <div class="cart-item-img">-->
      <!--            <img :src="defaultImg" :alt="product.product_name">-->
      <!--          </div>-->
      <!--          <div class="cart-item-name">{{ product.product_name }}</div>-->
      <!--          <div class="cart-item-qty">{{ product.quantity }}</div>-->
      <!--          <div class="cart-item-sum">{{ product.price * product.quantity }}</div>-->
      <!--          <a @click.prevent="deleteFromCart(product)" href="#" class="cart-item-delete" :data-id="product.id_product"><i-->
      <!--              class="fas fa-times-circle"></i></a>-->
      <!--        </div>-->
    </div>
  </div>
</header>
<main>
  <div class="container">
    <?php include_once TEMPLATES_DIR . 'catalog.php'?>
  </div>
</main>
</body>
</html>