<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<footer class="footer">
  <div class="container">
    <div class="footer__wrap">
      <div class="footer__row">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="/">
              <? MyClass::siteLogo() ?>
            </a>
          </div>
          <div class="footer__copyright">
            <? $copyright = MyClass::getGlobalSettings(['PROPERTY_COPYRIGHT']); ?>
            <? echo htmlspecialcharsback($copyright['PROPERTY_COPYRIGHT_VALUE']['TEXT']) ?>
          </div>
        </div>
        <div class="footer__col">
          <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "footer_menu",
            Array(
              "ALLOW_MULTI_SELECT" => "N",
              "CHILD_MENU_TYPE" => "left",
              "DELAY" => "N",
              "MAX_LEVEL" => "1",
              "MENU_CACHE_GET_VARS" => array(""),
              "MENU_CACHE_TIME" => "3600",
              "MENU_CACHE_TYPE" => "N",
              "MENU_CACHE_USE_GROUPS" => "Y",
              "ROOT_MENU_TYPE" => "bottom_1",
              "USE_EXT" => "N"
            )
          );?>
        </div>
        <div class="footer__col">
          <?$APPLICATION->IncludeComponent(
              "bitrix:menu",
              "footer_menu",
              Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "bottom_2",
                "USE_EXT" => "N"
              )
            );?>
        </div>
        <div class="footer__col">
          <div class="footer__social">
            <? MyClass::footerSocialLinks() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>