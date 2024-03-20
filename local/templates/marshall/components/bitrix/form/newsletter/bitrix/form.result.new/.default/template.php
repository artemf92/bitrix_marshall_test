<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<section class="mailing">
	<div class="container">
		<div class="mailing__wrap">
			<div class="mailing__title"><? echo GetMessage('FORM_CUSTOM_TITLE') ?></div>
			<div class="mailing__desc"><?=$arResult["FORM_DESCRIPTION"]?></div>
				<? if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
				<?=$arResult["FORM_NOTE"]?>
				<?=$arResult["FORM_HEADER"]?>
				<div class="mailing__form">
				<?
					foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
					{
					?>
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
								<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
							<?endif;?>
							<?=str_replace('inputtext', 'mailing__input', $arQuestion["HTML_CODE"])?>
					<?
					} //endwhile
					?>
				<?
				if($arResult["isUseCaptcha"] == "Y")
				{
				?>
						<tr>
							<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
						</tr>
						<tr>
							<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
							<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
						</tr>
				<?
				} // isUseCaptcha
				?>
					<input type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="mailing__submit">
					<div class="mailing__agree">
						<?= GetMessage("PRIVACY_TEXT") ?>
					</div>
			</div>
			<?=$arResult["FORM_FOOTER"]?>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.mailing__form .mailing__input:not([type="hidden"])').each(function() {
			switch ($(this).attr('name')) {
				case 'form_email_<?=$arResult['arForm']['ID']?>': 
					$(this).attr('placeholder', '<?=GetMessage('INPUT_EMAIL')?>')
					break
				case 'form_name_<?=$arResult['arForm']['ID']?>': 
					$(this).attr('placeholder', '<?=GetMessage('INPUT_NAME')?>')
					break
			}
		})
	})
</script>