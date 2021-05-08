<table class="adminTable" cellspacing="0" cellpadding="0" border="0" style="width:100%;">


		<? $i=1; foreach($list as $item):?>

			<tr class="<?=(Num::isEven($i))?'ui-state-hover':''?>">
				<td align="left"><?=$item->name?> <span style="display: inline-block; cursor: pointer;" class="ui-icon ui-icon-close gridIcon " onclick="deleteInterval(<?=$item->interval_id?>, <?=$item->article_id?>)"></span></td>
			</tr>

		<?php $i++; endforeach; ?>

</table>

