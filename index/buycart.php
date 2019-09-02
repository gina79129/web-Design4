<?
if(empty($_SESSION['mem'])){
  to('?do=login');
  exit();
}
?>
<h1 class="ct"><?=$_SESSION['mem']?>的購物車</h1>

<?
if(!empty($_GET['id'])){
  $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
 
}
if(empty($_SESSION['cart'])){
  echo "<h2 class='ct'>購物車是空的</h2>";
  exit();

}


?>
<table width="100%">
  <tr class="tt ct">
    <td style="padding:10px;">編號</td>
    <td style="padding:10px;">商品名稱</td>
    <td style="padding:10px;">數量</td>
    <td style="padding:10px;">庫存量</td>
    <td style="padding:10px;">單價</td>
    <td style="padding:10px;">小計</td>
    <td style="padding:10px;">刪除</td>
  </tr>
  <?
    foreach($_SESSION['cart'] as $id=>$qt){
      $item=find('item',$id);
  ?>
  <tr class="pp">
    <td style="padding:10px;" class="ct"><?=$item['no']?></td>
    <td style="padding:10px;"><?=$item['name']?></td>
    <td style="padding:10px;" class="ct"><?=$qt?></td>
    <td style="padding:10px;" class="ct"><?=$item['qt']?></td>
    <td style="padding:10px;" class="ct"><?=$item['price']?></td>
    <td style="padding:10px;" class="ct"><?=$qt*$item['price']?></td>
    <td style="padding:10px;" class="ct"><img src="./icon/0415.jpg" alt=""></td>
  </tr>
  
  <?
      

  }
  ?>
  </table>
  <div class="ct"><a href="index.php"><img src="./icon/0411.jpg" alt=""></a><a href="?do=chk"><img src="./icon/0412.jpg" alt=""></a></div>
