<?
$a=find('admins',$_GET['id']);
$pr=unserialize($a['pr']);
?>
<h1 class="ct">修改管理員權限</h1>
<form action="api.php?do=editadmin" method="post">
<table class="all">
  <tr>
    <td class="ct tt">帳號</td>
    <td class="pp"><input type="text" name="acc" value="<?=$a['acc']?>">
    <input type="hidden" name="id" value="<?=$_GET['id']?>"></td>
  </tr>
  <tr>
    <td class="ct tt">密碼</td>
    <td class="pp"><input type="password" name="pw" value="<?=$a['pw']?>"></td>
  </tr>
  <tr>
    <td class="ct tt">權限</td>
    <td class="pp">
    <input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$pr))?"checked":"";?>>商品分類與管理<br>
    <input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$pr))?"checked":"";?>>訂單管理<br>
    <input type="checkbox" name="pr[]" value="3" <?=(in_array(3,$pr))?"checked":"";?>>會員管理<br>
    <input type="checkbox" name="pr[]" value="4" <?=(in_array(4,$pr))?"checked":"";?>>頁尾版權區管理<br>
    <input type="checkbox" name="pr[]" value="5" <?=(in_array(5,$pr))?"checked":"";?>>最新消息管理
    </td>
  </tr>
</table>
<div class="ct"><input type="submit" value="修改">|<input type="reset" value="重置"></div>
</form>