<style>
   .card-4 {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
.imgsxs{
  max-width:80%;
  width:100%;
}

</style>
<?php require_once('php/connect.php'); ?>
<?php 
$sql=$conn->query("Select * from news");
while($show=$sql->fetch_assoc()){
?>
<center>
<img src="assets/image/news/<?php echo $show['new_image']?>" class="border-bottom border-primary card-4 imgsxs"></center>
<?php }?>
</div>