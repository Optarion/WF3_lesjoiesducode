$(document).ready(function(){
	$('.delete_item').click(function(){
		return confirm('Etes vous sur?');
	})

	$('.user_row').click(function(e){
		var user_id = e.currentTarget.childNodes[5].innerHTML
		window.location.href = '../admin/user_add.php?id=' + user_id + '&action=update';

	})
})