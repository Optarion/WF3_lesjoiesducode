$(document).ready(function(){

	function addTargetToItemListed(item, url_target){
		item.click(function(e){
			var user_id = e.currentTarget.childNodes[5].innerHTML
			window.location.href = url_target + '?id=' + user_id + '&action=update';
		})
	}

	addTargetToItemListed($('.user_row'), '../admin/user_add.php');
	addTargetToItemListed($('.post_row'), '../admin/article_action.php');

	$('.delete_item').click(function(){
		return confirm('Etes vous sur?');
	})

})