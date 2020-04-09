<?php 
$sql=$conn->query('SELECT DISTINCT product_tag FROM product WHERE product_tag = product_tag');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php while($show=$sql->fetch_array()){?>
      <li class="nav-item ">
        <a class="nav-link active" href="?product_tag=<?php echo $show['product_tag'] ?>"><?php echo $show['product_tag'] ?></a>
      </li>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <div class="right search"><input type="search" placeholder="Search..." id="search"><br></div>
    </form>
  </div>

</nav>