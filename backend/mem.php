<h1 class="ct">會員管理</h1>
<table class="all">
  <tr class="tt ct">
    <td>姓名</td>
    <td>會員帳號</td>
    <td>註冊日期</td>
    <td>操作</td>
  </tr>
  <?
  $mem=all('mem','');
  foreach($mem as $m){

  ?>
  <tr class="pp ct">
    <td><?=$m['name']?></td>
    <td><?=$m['acc']?></td>
    <td><?=date("Y/m/d",strtotime($m['regdate']))?></td>
    <td>
    <button onclick="lof('?do=editmem&id=<?=$m['id']?>')">修改</button>
    <button onclick="del('mem','<?=$m['id']?>')">刪除</button>
    </td>
  </tr>
  <?
  
  }
  ?>
</table>