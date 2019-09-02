<h1 class="ct">新增商品</h1>
<form action="api.php?do=newitem" method="post" enctype="multipart/form-data">
<table class="all">
  <tr>
    <td class="ct tt">所屬大類</td>
    <td class="pp"><select name="big" id="big">
    <option value="0">請選擇一項</option>
    <?
    $type=all('type',['parent'=>0]);
    foreach($type as $t){
      echo "<option value='".$t['id']."'>".$t['name']."</option>";
    }
    ?>
    </select></td>
  </tr>
  <tr>
    <td class="ct tt">所屬中類</td>
    <td class="pp"><select name="mid" id="mid">
    <option value="0">請先選擇大類</option>
    </select></td>
  </tr>
  <tr>
    <td class="ct tt">商品編號</td>
    <td class="pp"><input type="text" name="no" id="no" value="完成分類後會自動分類" style="background:#EFCA85;margin:0;border:0;font-size:16px;"></td>
  </tr>
  <tr>
    <td class="ct tt">商品名稱</td>
    <td class="pp"><input type="text" name="name" value=""></td>
  </tr>
  <tr>
    <td class="ct tt">商品價格</td>
    <td class="pp"><input type="text" name="price" value=""></td>
  </tr>
  <tr>
    <td class="ct tt">規格</td>
    <td class="pp"><input type="text" name="spec" value=""></td>
  </tr>
  <tr>
    <td class="ct tt">庫存量</td>
    <td class="pp"><input type="text" name="qt" value=""></td>
  </tr>
  <tr>
    <td class="ct tt">商品圖片</td>
    <td class="pp"><input type="file" name="file"></td>
  </tr>
  <tr>
    <td class="ct tt">商品介紹</td>
    <td class="pp"><textarea name="intro" cols="30" rows="10"></textarea></td>
  </tr>
</table>
<div class="ct"><input type="submit" value="新增">|
<input type="reset" value="重置">|
<input type="button" value="返回" onclick="lof('?do=th')"></div>
</form>
<script>
function chgmid(){
  let big=$("#big option:selected").val()
  $.post("api.php?do=chgmid",{big},function(x){
    $("#mid").html(x)
    chgno()
  })
}
function chgno(){
  let no=Math.floor(Math.random()*999999)+100000
  $("#no").val(no)

}


$("#big").on("change",function(){
  chgmid()
})
$("#mid").on("change",function(){
  chgno()
})
</script>