<div class="ct"><button onclick="lof('?do=newadmin')">新增管理員</button></div>
<table class="all">
  <tr>
    <td class="ct tt">帳號</td>
    <td class="ct tt">密碼</td>
    <td class="ct tt">管理</td>
  </tr>
  <?
    $admin=all('admins','');
    foreach($admin as $a){

  ?>
  <tr class="ct">
    <td class="pp tt"><?=$a['acc']?></td>
    <td class="pp tt"><?=str_repeat("*",strlen($a['pw']))?></td>
    <td class="pp tt">
      <?
        if($a['acc']=='admin'){
          echo "此為最高權限";
        }else{
      ?>

    <button onclick="lof('?do=editadmin&id=<?=$a['id']?>')">修改</button>
    <button onclick="del('admin','<?=$a['id']?>')">刪除</button>
    <?
          
        }
    ?>
    </td>
  </tr>
  <?
      
    }
  ?>
</table>

<div class="ct"><button onclick="lof('index.php')">返回</button></div>