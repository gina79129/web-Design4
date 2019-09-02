<?
$m=find('mem',['acc'=>$_SESSION['mem']]);
?>
<form action="api.php?do=chkout" method="post">
<h1 class="ct">填寫資料</h1>
<table class="all">
  <tr>
    <td class="ct tt">會員帳號</td>
    <td class="pp" colspan="4"><?=$m['acc']?></td>
  </tr>
  <tr>
    <td class="ct tt">姓名</td>
    <td class="pp" colspan="4"><input type="text"  name="name" value="<?=$m['name']?>"></td>
  </tr>
  <tr>
    <td class="ct tt">電子信箱</td>
    <td class="pp" colspan="4"><input type="text"  name="email" value="<?=$m['email']?>"></td>
  </tr>
  <tr>
    <td class="ct tt">聯絡地址</td>
    <td class="pp" colspan="4"><input type="text"  name="addr" value="<?=$m['email']?>"></td>
  </tr>
  <tr>
    <td class="ct tt">聯絡電話</td>
    <td class="pp" colspan="4"><input type="text"  name="tel" value="<?=$m['tel']?>"></td>
  </tr>
  <tr class="ct tt">
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?
  $sum=0;
    foreach($_SESSION['cart'] as $id=>$qt){
      $item=find('item',$id);
  ?>
  <tr class="pp ct">
    <td><?=$item['name']?></td>
    <td><?=$item['no']?></td>
    <td><?=$qt?></td>
    <td><?=$item['price']?></td>
    <td><?=$qt*$item['price']?></td>
  </tr>
  <?
$sum=$sum+$qt*$item['price'];
  }
  ?>

  <tr class="ct tt">
    <td colspan="5">總價:<?=$sum?></td>
  </tr>
</table>
<div class="ct">
<input type="hidden" name="total" value="<?=$sum?>">
<input type="submit" value="確定送出">
<input type="button" onclick="lof('index.php')" value="返回修改訂單">
</div>
</form>