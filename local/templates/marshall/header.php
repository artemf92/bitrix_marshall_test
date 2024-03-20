<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Page\Asset;

CJSCore::Init(['popup', 'jquery']);
?>
<!DOCTYPE html>
<html>

<head>
  <?$APPLICATION->ShowHead();?>
  <title>
    <?$APPLICATION->ShowTitle();?>
  </title>
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<? 
	Asset::getInstance()->addCss("https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
	?>
</head>

<body>
  <div id="panel">
    <?$APPLICATION->ShowPanel();?>
  </div>
  <div class="wrapper">

		<? include __DIR__ . '/page-blocks/header.php' ?>

		<main class="main">
			<? if ($APPLICATION->GetCurPage() != '/') { ?>
				<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"",
						Array(
							"PATH" => "",
							"SITE_ID" => SITE_ID,
							"START_FROM" => "0"
						)
					);?>
			<? } ?>
			<section class="<? $APPLICATION->AddBufferContent("pageClass"); ?>">
				<div class="container">
					<!-- h1 -->
					<? $APPLICATION->AddBufferContent("showPageH1"); ?>
					<!-- /h1 -->