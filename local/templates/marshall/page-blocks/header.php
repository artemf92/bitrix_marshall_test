<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<header class="header">
  <div class="container">
    <div class="header__row">
      <div class="header__logo">
        <a href="/">
          <? MyClass::siteLogo() ?>
        </a>
      </div>
      <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "top",
        Array(
          "ALLOW_MULTI_SELECT" => "N",
          "CHILD_MENU_TYPE" => "left",
          "DELAY" => "N",
          "MAX_LEVEL" => "1",
          "MENU_CACHE_GET_VARS" => array(""),
          "MENU_CACHE_TIME" => "3600",
          "MENU_CACHE_TYPE" => "N",
          "MENU_CACHE_USE_GROUPS" => "Y",
          "ROOT_MENU_TYPE" => "top",
          "USE_EXT" => "N"
        )
      );?>
    </div>
  </div>
</header>