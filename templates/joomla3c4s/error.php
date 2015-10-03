<?php
/**
* @package   yoo_katana
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

if (($this->error->getCode()) == '404') {
    header('Location: /index.php?option=com_content&view=article&id=75');
    exit;
}

// get warp
$warp = require(__DIR__.'/warp.php');

// set messages
$title   = $this->title;
$error   = $this->error->getCode();
$message = $this->error->getMessage();

// set 404 messages
if ($error == '404') {
    $title   = JText::_('TPL_WARP_404_PAGE_TITLE');
    $message = JText::sprintf('TPL_WARP_404_PAGE_MESSAGE', JURI::root(false), $warp['config']->get('site_name'));
}

// render error layout
echo $warp['template']->render('error', compact('title', 'error', 'message'));