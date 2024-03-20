<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';
$strReturn .= ' <div class="container">';
$strReturn .= '	 <div class="breadcrumbs__list">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if ($title == 'Главная') 
		$title = 'main page';
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__item" title="'.$title.'" itemprop="item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<span itemprop="name">'.$title.'</span>
					<meta itemprop="position" content="'.($index + 1).'" />
				</a>';
	}
	else
	{
		$strReturn .= '<div class="breadcrumbs__item breadcrumbs__item-active">
			<span itemprop="name">'.$title.'</span></div>';
	}
}

$strReturn .= '</div></div></section>';

return $strReturn;
