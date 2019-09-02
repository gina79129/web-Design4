<h1 class="ct">訂單管理</h1>
<table width="100%">
  <tr class="ct tt">
    <td style="padding:10px">訂單編號</td>
    <td style="padding:10px">金額</td>
    <td style="padding:10px">會員帳號</td>
    <td style="padding:10px">姓名</td>
    <td style="padding:10px">下單時間</td>
    <td style="padding:10px">操作</td>
  </tr>
  <?
  $ord=all('ords','');
  foreach($ord as $o){
  ?>
  <tr>
    <td class="td pp ct"><a href="?do=itemdetail&id=<?=$o['id']?>"><?=$o['no']?></a></td>
    <td class="td pp ct"><?=$o['total']?></td>
    <td class="td pp ct"><?=$o['acc']?></td>
    <td class="td pp ct"><?=$o['name']?></td>
    <td class="td pp ct"><?=date("Y/m/d",strtotime($o['orddate']))?></td>
    <td class="td pp ct"><button onclick="del('ords',<?=$o['id']?>)">刪除</button></td>
  </tr>
  <?
    
  }
  ?>
</table>