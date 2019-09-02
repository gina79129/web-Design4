<style>
li{
  border-bottom:1px solid white;
}

</style>
<?
if(!empty($_GET['big'])){
  $data=['big'=>$_GET['big']];
  $type=find('type',$_GET['big']);
  $nav=$type['name'];
}else{
  if(!empty($_GET['mid'])){
    $data=['mid'=>$_GET['mid']];
    $mm=find('type',['id'=>$_GET['mid']]);
    $mb=find('type',['id'=>$mm['parent']]);
    $nav=$mb['name'] . ">" . $mm['name'];
  }else{
    $data="";
    $nav="全部商品";
  }
}

?>
<h2><?=$nav?></h2>
<?
$item=all('item',$data);
foreach($item as $i){

?>
<table class="all">
  <tr class="pp">
  <td><a href="?do=detail&id=<?=$i['id']?>"><img src="./img/<?=$i['file']?>" style="width:300px;height:200px;"></a></td>
  <td>
  <ul style="margin:0;padding:0;list-style-type:none;">
    <li class="ct tt"><?=$i['name']?></li>
    <li>售價:<?=$i['price']?>
    <span style="float:right"><a href="?do=buycart&id=<?=$i['id']?>&qt=1"><img src="./icon/0402.jpg"></a></span>
    </li>
    <li>規格:<?=$i['spec']?></li>
    <li>簡介:<?=$i['intro']?></li>
  </ul>
  </td>
  </tr>
  <?
  
}
  ?>
</table>