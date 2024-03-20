<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$showLink = $arResult['PROPERTIES']['SHOW_LINK'];
$btnLink = $arResult['PROPERTIES']['BTN_LINK'];
$btnText = $arResult['PROPERTIES']['BTN_TITLE'];
?>
<div class="welcome__row">
	<div class="welcome__text">
		<?if($arResult["DETAIL_TEXT"] <> ''):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
		<? if ($showLink['VALUE_XML_ID'] == 'Y') { ?>
		<a href="<?=$btnLink['VALUE'] ?>" class="empty-btn"><?= $btnText['VALUE'] ?></a>
		<? } ?>
	</div>
	<div class="welcome__img">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
		<?endif?>
	</div>
</div>
<a href="#" class="arrow-down"
	><img src="<?= SITE_TEMPLATE_PATH ?>/img/arrow-down.svg" alt="Down"
/></a>