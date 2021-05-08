
<? foreach($list as $type => $items):?>

	<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">

		<tr class="ui-state-hover">
			<td align="left"><?=$types[$type]?></td>
		</tr>

		<? $i=1; foreach($items as $item): ?>

			<tr class="<?=(Num::isEven($i))?'ui-state-hover':''?>">
				<td align="left"><?=$item->name?> <span style="display: inline-block; cursor: pointer;" class="ui-icon ui-icon-close gridIcon " onclick="deleteSection(<?=$item->section_id?>, <?=$item->article_id?>)"></span></td>
			</tr>

		<?php $i++; endforeach; ?>

	</table>

	<br><br>

<?php endforeach; ?>

