<?php
/* 
 * Файл настройки
 *  
 */
 # Для чего это нужно??? // константы для обращение к контроллерам


define('PathPrefix', '../controller/');
define('PathPosfix', 'Controller.php');
 
# использумый шаблон
$template = 'default';

//пути к файлам шаблонов (*.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

//пути файлов шаблонов в вебпространстве
define('TemplateWebPath', "/templates/{$template}/");

//Инициализация шаблонизатора smarty 
//put to path to Smarty.class.php
require ('../library/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cashe');
$smarty->setConfigDir('../library/smarty/configs');

$smarty->assign('TemplateWebPath', TemplateWebPath);

 