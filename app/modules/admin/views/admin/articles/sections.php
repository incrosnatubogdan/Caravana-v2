<div id="adminForm" style="width:50%;">

	<a href="<?= url::base(true, true) ?>administration/articles/edit_text/<?= $item->id ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button">
		<span class="ui-button-text">Articol</span> </a>

	<br><br>

	<table class="adminTable" border="0" style="width:100%;">
		<tbody>
		<tr class="ui-state-hover">
			<td align="left">Cauta sectiune</td>
			<td align="left"><input type="text" name="autoComplete" autocomplete="off" id="tagAutoComplete"/></td>
		</tr>
		</tbody>
	</table>
	<br><br>
	<div id="sections_list"></div>

</div>

<script>
	$(function () {

		$("#tagAutoComplete").autocomplete({
			source: url_base + "administration/articles/sections/<?=$item->language?>/<?=$item->id?>",
			minLength: 2,
			select: function (event, ui) {
				addNewSection(ui.item.id, <?=$item->id?>);
			},
			close: function(event, ui){
				$("#tagAutoComplete").val('');
			}
		});

		loadSections(<?=$item->id?>);
	});

	function addNewSection(sectionId, articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/add_section/' + sectionId + '/' + articleId,
			success: function(html){
				loadSections(articleId);
			}
		});
	}

	function deleteSection(sectionId, articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/delete_section/' + sectionId + '/' + articleId,
			success: function(html){
				loadSections(articleId);
			}
		});
	}

	function loadSections(articleId)
	{
		$.ajax({
			method: "get",
			url: url_base + 'administration/articles/list_sections/' + articleId + '/' ,
			success: function(html){
				$('#sections_list').html(html);
			}
		});
	}
</script>
