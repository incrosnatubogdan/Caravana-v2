<div id="adminForm" style="width:50%;">

	<a href="<?= url::base(true, true) ?>administration/articles/edit_text/<?= $item->id ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button">
		<span class="ui-button-text">Content</span> </a>

	<a href="<?= url::base(true, true) ?>administration/articles/edit_sections/<?=$item->id?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button">
		<span class="ui-button-text">Sections</span> </a>

	<br><br>

	<table class="adminTable" border="0" style="width:100%;">
		<tbody>
		<tr class="ui-state-hover">
			<td align="left">Search age interval</td>
			<td align="left"><input type="text" name="autoComplete" autocomplete="off" id="tagAutoComplete"/></td>
		</tr>
		</tbody>
	</table>
	<br><br>
	<div id="intervals_list"></div>

</div>

<script>
	$(function () {

		$("#tagAutoComplete").autocomplete({
			source: url_base + "administration/articles/intervals/<?=$item->language?>/<?=$item->id?>",
			minLength: 2,
			select: function (event, ui) {
				addNewInterval(ui.item.id, <?=$item->id?>);
			},
			close: function(event, ui){
				$("#tagAutoComplete").val('');
			}
		});

		loadIntervals(<?=$item->id?>);
	});

	function addNewInterval(intervalId, articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/add_interval/' + intervalId + '/' + articleId,
			success: function(html){
				loadIntervals(articleId);
			}
		});
	}

	function deleteInterval(intervalId, articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/delete_interval/' + intervalId + '/' + articleId,
			success: function(html){
				loadIntervals(articleId);
			}
		});
	}

	function loadIntervals(articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/list_intervals/' + articleId + '/' ,
			success: function(html){
				$('#intervals_list').html(html);
			}
		});
	}
</script>
