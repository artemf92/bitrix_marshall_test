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
<section class="concerts">
	<div class="container">
		<? echo sprintf('<%s>%s</%s>', $arParams['TITLE_TAG'], GetMessage('SECTION_TITLE'), $arParams['TITLE_TAG']) ?>
		<div class="concerts__wrap">
			<? if (count($arResult["ITEMS"]) > 0) { ?>
				<div class="concerts__list">
					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						$day = date('d', strtotime($arItem['DATE_ACTIVE_TO']));
						$month = date('M', strtotime($arItem['DATE_ACTIVE_TO']));
						?>
						<a href="<? echo $arItem['DETAIL_PAGE_URL'] ?>" class="concerts__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div class="concerts__img-wrap">
							<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
								<div class="concerts__img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>
							<?endif?>
							</div>                                    
							<div class="concerts__body">
									<div class="concerts__date">
										<div class="concerts__date-num"><?= $day ?></div>
										<div class="concerts__date-month"><?= $month ?></div>
									</div>
									<div class="concerts__title">
										<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
												<div class="concerts__name"><?echo $arItem["NAME"]?></div>
										<?endif;?>
										<? if ($arItem['PROPERTIES']['LOCATION']['VALUE'] != '') { ?>
											<div class="concerts__location">
													<?= $arItem['PROPERTIES']['LOCATION']['VALUE'] ?>
											</div>
										<? } ?>
									</div>
							</div>
						</a>
					<? endforeach; ?>
				</div>
				<? } else {
					echo GetMessage("NOT_FOUND");
				} ?>
		</div>
	</div>
</section>