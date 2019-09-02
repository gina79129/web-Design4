<?
if(!empty($_POST['bot'])){
  q("update bot set bot='".$_POST['bot']."'");
}

?>

<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
<table class="all">
<?
$bot=find('bot',1)['bot'];
?>
  <tr>
    <td class="ct tt">頁尾宣告內容</td>
    <td class="pp"><input type="text" name="bot" value="<?=$bot?>"></td>
  </tr>
</table>
<div class="ct"><input type="submit" value="編輯">|<input type="reset" value="重置"></div>
</form>