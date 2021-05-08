<div class="form-group <?=($field->hasErrors()) ? 'has-error': '';?>"><label class="control-label"><?=$field->getTheLabel()?></label>
  <? if ($field->getTheName() == 'county'): ?>
		<select name="form[<?=$field->getTheName()?>][value]" class="form-control">
			<option <? if($field->getValue() == 'Alba'):?>selected<?endif;?> value="Alba">Alba</option>
			<option <? if($field->getValue() == 'Arad'):?>selected<?endif;?> value="Arad">Arad</option>
			<option <? if($field->getValue() == 'Arges'):?>selected<?endif;?> value="Arges">Arges</option>
			<option <? if($field->getValue() == 'Bacau'):?>selected<?endif;?> value="Bacau">Bacau</option>
			<option <? if($field->getValue() == 'Bihor'):?>selected<?endif;?> value="Bihor">Bihor</option>
			<option <? if($field->getValue() == 'Bistrita Nasaud'):?>selected<?endif;?> value="Bistrita Nasaud">Bistrita Nasaud</option>
			<option <? if($field->getValue() == 'Botosani'):?>selected<?endif;?> value="Botosani">Botosani</option>
			<option <? if($field->getValue() == 'Brasov'):?>selected<?endif;?> value="Brasov">Brasov</option>
			<option <? if($field->getValue() == 'Braila'):?>selected<?endif;?> value="Braila">Braila</option>
			<option <? if($field->getValue() == 'Bucuresti'):?>selected<?endif;?> value="Bucuresti">Bucuresti</option>
			<option <? if($field->getValue() == 'Buzau'):?>selected<?endif;?> value="Buzau">Buzau</option>
			<option <? if($field->getValue() == 'Caras Severin'):?>selected<?endif;?> value="Caras Severin">Caras Severin</option>
			<option <? if($field->getValue() == 'Calarasi'):?>selected<?endif;?> value="Calarasi">Calarasi</option>
			<option <? if($field->getValue() == 'Cluj'):?>selected<?endif;?> value="Cluj">Cluj</option>
			<option <? if($field->getValue() == 'Constanta'):?>selected<?endif;?> value="Constanta">Constanta</option>
			<option <? if($field->getValue() == 'Covasna'):?>selected<?endif;?> value="Covasna">Covasna</option>
			<option <? if($field->getValue() == 'Dambovita'):?>selected<?endif;?> value="Dambovita">Dambovita</option>
			<option <? if($field->getValue() == 'Dolj'):?>selected<?endif;?> value="Dolj">Dolj</option>
			<option <? if($field->getValue() == 'Galati'):?>selected<?endif;?> value="Galati">Galati</option>
			<option <? if($field->getValue() == 'Giurgiu'):?>selected<?endif;?> value="Giurgiu">Giurgiu</option>
			<option <? if($field->getValue() == 'Gorj'):?>selected<?endif;?> value="Gorj">Gorj</option>
			<option <? if($field->getValue() == 'Harghita'):?>selected<?endif;?> value="Harghita">Harghita</option>
			<option <? if($field->getValue() == 'Hunedoara'):?>selected<?endif;?> value="Hunedoara">Hunedoara</option>
			<option <? if($field->getValue() == 'Ialomita'):?>selected<?endif;?> value="Ialomita">Ialomita</option>
			<option <? if($field->getValue() == 'Iasi'):?>selected<?endif;?> value="Iasi">Iasi</option>
			<option <? if($field->getValue() == 'Ilfov'):?>selected<?endif;?> value="Ilfov">Ilfov</option>
			<option <? if($field->getValue() == 'Maramures'):?>selected<?endif;?> value="Maramures">Maramures</option>
			<option <? if($field->getValue() == 'Mehedinti'):?>selected<?endif;?> value="Mehedinti">Mehedinti</option>
			<option <? if($field->getValue() == 'Mures'):?>selected<?endif;?> value="Mures">Mures</option>
			<option <? if($field->getValue() == 'Neamt'):?>selected<?endif;?> value="Neamt">Neamt</option>
			<option <? if($field->getValue() == 'Olt'):?>selected<?endif;?> value="Olt">Olt</option>
			<option <? if($field->getValue() == 'Prahova'):?>selected<?endif;?> value="Prahova">Prahova</option>
			<option <? if($field->getValue() == 'Satu Mare'):?>selected<?endif;?> value="Satu Mare">Satu Mare</option>
			<option <? if($field->getValue() == 'Salaj'):?>selected<?endif;?> value="Salaj">Salaj</option>
			<option <? if($field->getValue() == 'Sibiu'):?>selected<?endif;?> value="Sibiu">Sibiu</option>
			<option <? if($field->getValue() == 'Suceava'):?>selected<?endif;?> value="Suceava">Suceava</option>
			<option <? if($field->getValue() == 'Teleorman'):?>selected<?endif;?> value="Teleorman">Teleorman</option>
			<option <? if($field->getValue() == 'Timis'):?>selected<?endif;?> value="Timis">Timis</option>
			<option <? if($field->getValue() == 'Tulcea'):?>selected<?endif;?> value="Tulcea">Tulcea</option>
			<option <? if($field->getValue() == 'Vaslui'):?>selected<?endif;?> value="Vaslui">Vaslui</option>
			<option <? if($field->getValue() == 'Valcea'):?>selected<?endif;?> value="Valcea">Valcea</option>
			<option <? if($field->getValue() == 'Vrancea'):?>selected<?endif;?> value="Vrancea">Vrancea</option>
		</select>
  <? else: ?>
		<input type="text" name="form[<?=$field->getTheName()?>][value]" value="<?=$field->getValue()?>" class="form-control">
  <? endif; ?>

</div>
