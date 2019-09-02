<?
include "base.php";
$do=(!empty($_GET['do']))?$_GET['do']:"";
switch($do){
  case "newadmin":
  $data['acc']=$_POST['acc'];
  $data['pw']=$_POST['pw'];
  $data['pr']=serialize($_POST['pr']);
  save('admins',$data);
  to("backend.php?do=admin");
  break;

  case "editadmin":
  $data=find('admins',$_POST['id']);
  $data['acc']=$_POST['acc'];
  $data['pw']=$_POST['pw'];
  $data['pr']=serialize($_POST['pr']);
  save('admins',$data);
  to("backend.php?do=admin");
  break;

  case "editmem":
  $data=find('mem',$_POST['id']);
  foreach($_POST as $k=>$v){
    $data[$k]=$v;
  }
  save('mem',$data);
  to("backend.php?do=mem");
  break;

  case "del":
  del($_POST['table'],$_POST['id']);
  break;

  case "chkacc":
  $acc=$_POST['acc'];
  $chkacc=nums('admins',['acc'=>$acc]);
  if($acc=='admin'){
    echo 2;
  }else{
    if($chkacc>0){
      echo 1;
    }else{
      echo 3;
    }
  }
  
  break;

  case "reg":
  save('mem',$_POST);
  break;

  case "chk":
  $chk=$_POST['chk'];
  if($chk!=$_SESSION['chk']){
  echo 1;
  }else{
    echo 2;
  }
  break;

  case "login":
  $acc=$_POST['acc'];
  $pw=$_POST['pw'];
  $chkall=nums('mem',['acc'=>$acc,'pw'=>$pw]);
  if($chkall>0){
    $_SESSION['mem']=$acc;
    echo 2;
  }else{
    echo 1;
  }
  break;

  case "admin":
  $acc=$_POST['acc'];
  $pw=$_POST['pw'];
  $chkall=nums('admins',['acc'=>$acc,'pw'=>$pw]);
  if($chkall>0){
    $_SESSION['admin']=$acc;
    echo 2;
  }else{
    echo 1;
  }
  break;

  case "newbig":
  $big=$_POST['big'];
  save('type',['name'=>$big]);
  break;

  case "newmid":
  $parent=$_POST['parent'];
  $mid=$_POST['mid'];
  save('type',['name'=>$mid,'parent'=>$parent]);
  break;

  case "chgtype":
  $type=find('type',$_POST['id']);
  $type['name']=$_POST['chk'];
  save('type',$type);
  break;

  case "chgmid":
  $big=$_POST['big'];
  $type=all('type',['parent'=>$big]);
  foreach($type as $t){
  if(!empty($_POST['mid'])){
    $sel=($_POST['mid']==$t['id'])?"selected":"";
  }else{
    $sel="";
  }
  echo "<option value='".$t['id']."' $sel>".$t['name']."</option>";
      
}
  break;

  case "newitem":
  if(!empty($_FILES['file']['tmp_name'])){
    $data['file']=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"./img/".$data['file']);
  }
  foreach($_POST as $k=>$v){
    $data[$k]=$v;
  }
  save('item',$data);
  to("backend.php?do=th");
  break;

  case "edititem":
  $item=find('item',$_GET['id']);
  foreach($_POST as $k=>$v){
    switch($k){
      case "big":
      case "mid":
      case "no":
      case "file":
      break;
      default:
      $item[$k]=$v;
      break;
    }
  }
  save('item',$item);
  to("backend.php?do=th");
  break;

  case "show":
  $show=find('item',$_POST['id']);
  $show['sh']=($show['sh']+1)%2;
  save('item',$show);
  break;

  case "chkout":
  $data['acc']=$_SESSION['mem'];
  foreach($_POST as $k=>$v){
    $data[$k]=$v;
  }
  $data['item']=serialize($_SESSION['cart']);
  $maxid=q("select max(`id`) from ords")[0][0]+1;
  $data['no']=date("Ymd").sprintf("%04d",$maxid);
  // print_r($data);
  save('ords',$data);
  unset($_SESSION['cart']);
  $total=find('mem',['acc'=>$_SESSION['mem']]);
  $total['total']=$total['total']+$_POST['total'];
  save('mem',$total);
  to("index.php");
  break;
}

?>