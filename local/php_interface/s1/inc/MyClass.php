<?

use Bitrix\Iblock\ElementTable;

defined('B_PROLOG_INCLUDED') || die;

class MyClass {
  public static function siteLogo() {
    echo '<img src="' . SITE_TEMPLATE_PATH . '/img/logo.svg" alt="logo" />';
  }

  public static function footerSocialLinks() {
    $settings = self::getGlobalSettings(['PROPERTY_SOCIALS']);

    if ($settings['PROPERTY_SOCIALS_VALUE']) {
      $socials = $settings['PROPERTY_SOCIALS_VALUE'];
      echo '<ul class="footer__social-list">';
      foreach($socials as $k => $social) {
        $s = $social['SUB_VALUES'];
        echo sprintf('<li><a href="%s" class="footer__social-link">%s</a></li>', $s['SOCIAL_LINK']['VALUE'], $s['SOCIAL_TITLE']['VALUE']);
      }
      echo '</ul>';
    }
  }

  public static function getGlobalSettings($props) {
    $iblock_id = 1;

    CModule::IncludeModule("iblock");

    $arSelect = array_merge(Array("ID", "NAME"), $props);
    $arFilter = Array("IBLOCK_ID"=> $iblock_id, "CODE" => 'global');
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNextElement())
    {
      return $ob->GetFields();
    }
  }
}
?>