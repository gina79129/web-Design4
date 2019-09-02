<style>
li{
  border-bottom:1px solid white;
}

</style>

<?
$item=find('item',$_GET['id']);
$mb=find('type',['id'=>$item['big']]);

?>

<h1 class="ct"><?=$item['name']?></h1>
<table class="all">
  <tr class="pp">
    <td><img src="./img/<?=$item['file']?>" style="width:300px;height:200px"></td>
    <td>
    <ul style="margin:0;padding:0;list-style-type:none;">
      <li>分類:<?=$mb['name']?> > <?=$item['name']?></li>
      <li>編號:<?=$item['no']?></li>
      <li>價格:<?=$item['price']?></li>
      <li>詳細說明:<?=$item['intro']?></li>
      <li>庫存量:<?=$item['qt']?></li>
    </ul>
    </td>
  </tr>
  <tr class="ct tt">
      <td colspan="2">購買數量:<input type="qt" id="qt" value="1" style="width:20px;"><a href="javascript:butit()"><img src="./icon/0402.jpg" alt=""></a></td>
    </tr>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
<script>
function butit(){
  let qt=$("#qt").val();
  lof('?do=buycart&id=<?=$_GET['id']?>&qt='+qt)
}


</script>