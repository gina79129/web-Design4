<h1 class="ct">商品分類</h1>
<div class="ct">新增大類<input type="text" name="big" id="big">
<button onclick="newbig()">新增</button></div>
<div class="ct">新增中類<select name="selbig" id="selbig">
<?
$type=all('type',['parent'=>0]);
foreach($type as $t){
  echo "<option value='".$t['id']."'>".$t['name']."</option>";
}
?>

</select>
<input type="text" name="mid" id="mid">
<button onclick="newmid()">新增</button></div>
<table class="all">
<?
$big=all('type',['parent'=>0]);
foreach($big as $k=>$b){
?>
  <tr class="tt">
    <td id="no<?=$b['id']?>"><?=$b['name']?></td>
    <td class="ct">
    <button onclick="chgtype(<?=$b['id']?>)">修改</button>
    <button onclick="del('type','<?=$b['id']?>')">刪除</button>
    </td>
  </tr>
  <?
    if(nums('type',['parent'=>$b['id']])>0){
      $mid=all('type',['parent'=>$b['id']]);
      foreach($mid as $k=>$m){
      ?>
    <tr class="ct pp">
      <td id="no<?=$m['id']?>"><?=$m['name']?></td>
      <td>
      <button onclick="chgtype(<?=$m['id']?>)">修改</button>
      <button onclick="del('type','<?=$m['id']?>')">刪除</button>
      </td>
    </tr>
      <?
         }
    }
  ?>
  <?
  }
  ?>
</table>
<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="lof('?do=newitem')">新增商品</button></div>
<table width="100%">
  <tr class="ct tt">
    <td style="padding:10px">編號</td>
    <td style="padding:10px">商品名稱</td>
    <td style="padding:10px">庫存量</td>
    <td style="padding:10px">狀態</td>
    <td style="padding:10px">操作</td>
  </tr>
  <?
  $item=all('item','');
  foreach($item as $k=>$i){
 
  ?>
  <tr class="pp ct">
    <td><?=$i['no']?></td>
    <td><?=$i['name']?></td>
    <td><?=$i['qt']?></td>
    <td><?=($i['sh']==1)?"販售中":"已下架";?></td>
    <td style="width:20%">
    <button onclick="lof('?do=edititem&id=<?=$i['id']?>')">修改</button>
    <button onclick="del('item',<?=$i['id']?>)">刪除</button>
    <button onclick="show(<?=$i['id']?>)">上架</button>
    <button onclick="show(<?=$i['id']?>)">下架</button>
    </td>
  </tr>
  <?
   
  }
  ?>
</table>
<script>
function chgtype(id){
  let name=$("#no"+id).text()
  console.log(name)
  let chk="";
  chk=prompt("請輸入您要修改的內容",name)
  if(chk!=null && chk!=""){
    $.post("api.php?do=chgtype",{chk,id},function(){
      location.reload();
    })
  }

}
function newbig(){
  let big=$("#big").val()
  $.post("api.php?do=newbig",{big},function(){
    location.reload();
  })
}
function newmid(){
  let parent=$("#selbig option:selected").val()
  let mid=$("#mid").val()
  console.log(parent)
  $.post("api.php?do=newmid",{parent,mid},function(){
    location.reload();
  })
}

</script>