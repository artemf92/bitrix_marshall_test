<?php
defined('B_PROLOG_INCLUDED') || die;

include __DIR__ . '/inc/MyClass.php';
function debug($obj)
{
    $class = $GLOBALS['USER']->IsAdmin() ? '' : 'hidden';
    echo ('<pre class="' . $class . '">' . print_r($obj, true) . '</pre>');
}

function pageClass() {
  global $APPLICATION;
  return $APPLICATION->GetPageProperty('PAGE_CLASS') ?: 'content';
}

function showPageH1()
{
    global $APPLICATION;
    $res = '';
    if ($APPLICATION->GetPageProperty('HIDE_TITLE') !== 'Y'){
		  $res .= '<h1 id="pagetitle">' . $APPLICATION->GetTitle() . ' </h1>';
    }
    return $res;
}
?>