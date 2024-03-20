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
?>
<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
	<div class="banner-img">
		<img
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	</div>
<?endif?>
<div class="artist-body">
	<div class="container">
			<h1><?= $arResult['NAME'] ?></h1>
			<div class="artist-body__row">
					<div class="artist-body__text">
						<?if($arResult["DETAIL_TEXT"] <> ''):?>
							<?echo $arResult["DETAIL_TEXT"];?>
						<?else:?>
							<?echo $arResult["PREVIEW_TEXT"];?>
						<?endif?>
					</div>
					<div class="artist-body__social">
						<? 
						$arSocials = ["FACEBOOK","INSTAGRAM", "TWITTER", "SPOTIFY"];
						?>
							<ul>
								<? foreach($arSocials as $social) { 
									$class = strtolower($social);
									$value = $arResult['PROPERTIES'][$social]['VALUE'];
									if ($value == '') continue;
									?>
									<li>
											<a href="<?=$value?>">
													<img src="<?= SITE_TEMPLATE_PATH?>/img/<?=$class?>-ico.svg" alt="<?=$class?> logo">
											</a>
									</li>
								<? } ?>
							</ul>
					</div>
			</div>
	</div>
</div>