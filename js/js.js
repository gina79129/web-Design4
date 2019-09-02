// JavaScript Document
function lof(x)
{
	location.href=x
}

function show(id){
	$.post("api.php?do=show",{id},function(){
		location.reload();
	})
}

function del(table,id){
	$.post("api.php?do=del",{table,id},function(){
		location.reload();
	})
}