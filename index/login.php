<h1>第一次購物</h1>
<a href="?do=reg"><img src="./icon/0413.jpg" alt=""></a>
<h1>會員登入</h1>
<form method="post">
<table class="all">
  <tr>
    <td class="ct tt">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td class="ct tt">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="ct tt">驗證碼</td>
    <td class="pp">
    <?
    $a=rand(10,99); 
    $b=rand(10,99); 
    $_SESSION['chk']=$a+$b;
    echo $a . "+"  . $b . "=";
    ?>
    
    <input type="text" name="chk" id="chk">
    </td>
  </tr>
</table>
<div class="ct"><input type="button" value="確認" onclick="login()"></div>
</form>
<script>
function login(){
  let acc=$("#acc").val()
  let pw=$("#pw").val()
  let chk=$("#chk").val()
  $.post("api.php?do=chk",{chk},function(x){
    if(x==1){
      alert("對不起，您輸入的驗證碼輸入有錯請您重新登入")
    }else{

      $.post("api.php?do=login",{acc,pw},function(z){
        if(z==1){
          alert("帳號或密碼輸入錯誤")
      
        }else{
          alert("登入成功")
          lof('index.php')
        }
        
      })
    }
  })
}


</script>