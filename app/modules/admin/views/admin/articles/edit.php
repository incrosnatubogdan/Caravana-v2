<div style="width:50%;">

	<a href="<?= url::base(true, true) ?>administration/articles/edit_sections/<?= $item->id ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button">
		<span class="ui-button-text">Sectiuni</span>
	</a>

	<br><br>

	<form method="post" id="adminForm" action="<?= url::base(true, true) ?>administration/articles/edit_text/<?= $item->id ?>">
		<input type="hidden" value="1" name="save"/>

		<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			<tbody>

			<tr class="ui-state-hover">
				<td align="left">Titlu</td>
				<td align="left"><input type="text" value="<?= $item->title ?>" name="item[title]"/></td>
			</tr>
			<tr>
				<td align="left">Vizualizari</td>
				<td align="left"><input type="text" value="<?= $item->views ?>" name="item[views]"/></td>
			</tr>
			<tr class="ui-state-hover">
				<td align="left">Descriere scurta</td>
				<td align="left">
					<textarea class="editor" name="item[teaser]" style="width:25%" rows="10"><?= $item->teaser ?></textarea>
				</td>
			</tr>
			<tr class="ui-state-hover">
				<td align="left">Descriere</td>
				<td align="left">
					<textarea class="editor" name="item[text]" style="width:25%" rows="10"><?= $item->text ?></textarea>
				</td>
			</tr>
			<tr>
				<td align="left">Upload poze</td>
				<td align="left">
					<?= View::factory('admin/pictures/upload')->set('item_id', $item->id)->set('item_type', 0) ?>
				</td>
			</tr>
			<tr class="ui-state-hover">
				<td align="left">Poze</td>
				<td align="left">
					<div class="message"></div>
					<?php
					echo View::factory('admin/pictures/list')
						->set('item_id', $item->id)
						->set('item_type', 0)
						->render()
						;
					?>
				</td>
			</tr>

			</tbody>
		</table>

		<button onclick="$('#adminForm').submit()" type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-admin-button" role="button" aria-disabled="false">
			<span class="ui-button-text">Salveaza</span></button>

	</form>

</div>

<?= editor::init('.editor'); ?>
