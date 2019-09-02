<?
$ord=find('ords',$_GET['id']);
?>
<h1 class="ct">訂單編號<span style="color:red"><?=$ord['no']?></span>的詳細資料</h1>
<table class="all">
  <tr>
    <td class="ct tt">會員帳號</td>
    <td class="pp" colspan="4"><?=$ord['acc']?></td>
  </tr>
  <tr>
    <td class="ct tt">姓名</td>
    <td class="pp" colspan="4"><?=$ord['name']?></td>
  </tr>
  <tr>
    <td class="ct tt">電子信箱</td>
    <td class="pp" colspan="4"><?=$ord['email']?></td>
  </tr>
  <tr>
    <td class="ct tt">聯絡地址</td>
    <td class="pp" colspan="4"><?=$ord['email']?></td>
  </tr>
  <tr>
    <td class="ct tt">聯絡電話</td>
    <td class="pp" colspan="4"><?=$ord['tel']?></td>
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
    $items=unserialize($ord['item']);
    foreach($items as $id=>$qt){
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
<div class="ct"><button onclick="lof('?do=order')">返回</button></div>