<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="footer__menu">
  <ul class="footer__menu-list">
    <?
		foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;
		?>
				<?if($arItem["SELECTED"]):?>
				<li><a href="<?=$arItem["LINK"]?>" class="footer__menu-link active"><?=$arItem["TEXT"]?></a></li>
				<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" class="footer__menu-link"><?=$arItem["TEXT"]?></a></li>
				<?endif?>

    <?endforeach?>

  </ul>
				</div>
<?endif?>