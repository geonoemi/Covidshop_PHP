<nav class="app-header">
    <div class="app-header-name">
        <p class="company-name">Pandémia kft. Webshop</p>
        <p class="company-slogan">- A járványügyi segédeszközök szakértõje</p>
    </div>
    <ul class="app-header-nav-links">

        <?php
            if(isset($_SESSION["username"])&&!isset($_SESSION['isadmin'])){
              echo '<li>Üdvözöljük, ';
              echo $_SESSION["username"];
              echo "</li>";
              echo '<li class="nav-item">
                    <a href="index.php">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                    <a href="index.php?c=products">Keresés</a>
                    </li>
                    <li class="nav-item">
                    <a href="index.php?c=orders">Megrendelések</a>
                    </li>
                    <li class="nav-item">
                    <a href="index.php?c=profile">Profilom</a>
                    </li>';
              echo "<li class=nav-item><a href='index.php?c=logout'>Kijelentkezés</a></li>";
            }elseif(isset($_SESSION["username"])&&isset($_SESSION['isadmin'])) {
              echo '<li>Üdvözöljük, ';
              echo $_SESSION["username"];
              echo "</li>";
              echo '<li class="nav-item">
                    <a href="index.php">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                    <a href="index.php?c=products">Keresés</a>
                    </li>
                    <a href="index.php?c=orders">Megrendelések</a>
                    </li>
                    <li class="nav-item">
                    <a href="index.php?c=addProducts">Új termék</a>
                    </li>';
              echo "<li class=nav-item><a href='index.php?c=logout'>Kijelentkezés</a></li>";
            }else{
              echo '
              <li class="nav-item">
              <a href="index.php?c=login">Bejelentkezés</a>
              </li>
              <li class="nav-item">
              <a href="index.php?c=registry">Regisztráció</a>
              </li>
              <li class="nav-item">
              <a href="index.php">Kezdőlap</a>
              </li>
              <li class="nav-item">
              <a href="index.php?c=products">Keresés</a>
              </li>';
            }
          ?>


          <li id="showCart" class="nav-item nav-item-cart">
                    <img src="shopping-cart.svg">
          </li>
      </ul>
      <div id="cart" style="display: none">
      <div class="cart-content-wrapper">
          <h2>Kosár</h2>
      </div>
      <div id="cartWrapperItems" class="cart-content-wrapper"></div>

      <div class="cart-content-wrapper checkout-wrapper">
        <a href="views/cart.php"><button id="checkout"> Tovább a pénztárhoz </button></a>
        </div>
      </div>
</nav>
