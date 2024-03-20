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
<section class="artists">
	<div class="container">
			<h2><?= GetMessage("ARTISTS_TITLE") ?></h2>
			<div class="artists__list">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="artists__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
							<div class="artists__photo">
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
											src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
											width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
											height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
											alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
											title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
											/></a>
								<?else:?>
									<img
										src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
										width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
										height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
										alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
										title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
										/>
								<?endif;?>
							</div>
						<?endif?>
						<div class="artists__body">
							<div class="artists__body-wrap">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
									<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
										<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="artists__name"><?echo $arItem["NAME"]?></a>
									<?else:?>
										<div class="artists__name"><?echo $arItem["NAME"]?></div>
									<?endif;?>
								<?endif;?>
								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
									<div class="artists__desc">
										<?echo $arItem["PREVIEW_TEXT"];?>
									</div>
								<?endif;?>
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"]):?>
								<div class="artists__more">
										<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="empty-btn"><?= GetMessage('LINK_MORE')?></a>
								</div>
								<? endif; ?>
							</div>
						</div>
					</div>
				<?endforeach;?>
		</div>
	</div>
</section>
