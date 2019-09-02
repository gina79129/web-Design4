<h1 class="ct">會員註冊</h1>
<form  method="post">
<table class="all">
  <tr>
    <td class="ct tt">姓名</td>
    <td class="pp"><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="ct tt">帳號</td>
    <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號" onclick="chkacc()"></td>
  </tr>
  <tr>
    <td class="ct tt">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="ct tt">電話</td>
    <td class="pp"><input type="text" name="tel" id="tel"></td>
  </tr>
  <tr>
    <td class="ct tt">住址</td>
    <td class="pp"><input type="text" name="addr" id="addr"></td>
  </tr>
  <tr>
    <td class="ct tt">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email"></td>
  </tr>
</table>
<div class="ct"><input type="button" value="註冊" onclick="reg()">|<input type="reset" value="重置"></div>
</form>
<script>
function chkacc(){
 let acc=$("#acc").val();
 $.post("api.php?do=chkacc",{acc},function(x){
  if(x==1){
    alert("帳號已被使用")
  }else if(x==2){
    alert("不得使用admin當作帳號")
  }else{
    alert("帳號可使用")
  }
 })
}

function reg(){

  let acc=$("#acc").val();
 let name=$("#name").val();
 let pw=$("#pw").val();
 let addr=$("#addr").val();
 let email=$("#email").val();
 let tel=$("#tel").val();
  $.post("api.php?do=chkacc",{acc},function(x){
  if(x==1){
    alert("帳號已被使用")
  }else if(x==2){
    alert("不得使用admin當作帳號")
  }else{
    $.post("api.php?do=reg",{acc,name,pw,addr,tel,email},function(x){
      if(x==1){
        alert("帳號或密碼輸入錯誤")
      }else{
        alert("註冊成功")
        lof('?do=login')
      }
    })
  }
 })
}
</script>