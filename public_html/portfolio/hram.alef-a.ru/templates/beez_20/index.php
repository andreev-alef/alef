<?php
/**
 * @package                Joomla.Site
 * @subpackage  Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn  = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom      = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft      = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
  $showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color        = $this->params->get('templatecolor');
$logo        = $this->params->get('logo');
$navposition    = $this->params->get('navposition');
$app        = JFactory::getApplication();
$doc        = JFactory::getDocument();
$templateparams    = $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
  if (!is_array($files)):
    $files = array($files);
  endif;
  foreach($files as $file):
    $doc->addStyleSheet($file);
  endforeach;
endif;

$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
  $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
  if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
  }
}

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<meta name='yandex-verification' content='7f8fb7df1695991e' />
<jdoc:include type="head" />

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>
<style type="text/css">
#line {
  width:98% ;
}
.logoheader {
  height:200px;
}
#header ul.menu {
  display:block !important;
  width:98.2% ;
}
</style>
<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
  var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
  var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
  var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
  var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
  var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
  var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
  var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
  var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
  var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
  var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
  var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
  var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
  var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
  var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
  var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
</script>
<script type="text/javascript" src="./jquery/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
	  if(document.all){
	  	jQuery('#oops_ie').show(300);
	  }
	}
);
</script>
</head>

<body>

<div id="all">
        <div id="back">
                <div id="header">
                                <div class="logoheader">
                                  <h1 id="logo">Церковь Иконы Божией Матери<br />&laquo;Всех скорбящих Радость&raquo;
                                    <span class="header1"></span>
                                  </h1>
                                </div>
                  <!-- end logoheader -->
                                        <ul class="skiplinks">
                                                <li><a href="#main" class="u2"><?php echo JText::_('TPL_BEEZ2_SKIP_TO_CONTENT'); ?></a></li>
                                                <li><a href="#nav" class="u2"><?php echo JText::_('TPL_BEEZ2_JUMP_TO_NAV'); ?></a></li>
                                            <?php if($showRightColumn ):?>
                                            <li><a href="#additional" class="u2"><?php echo JText::_('TPL_BEEZ2_JUMP_TO_INFO'); ?></a></li>
                                           <?php endif; ?>
                                        </ul>
                                        <h2 class="unseen"><?php echo JText::_('TPL_BEEZ2_NAV_VIEW_SEARCH'); ?></h2>
                                        <h3 class="unseen"><?php echo JText::_('TPL_BEEZ2_NAVIGATION'); ?></h3>
                                        <jdoc:include type="modules" name="position-1" />
                                        <div id="line">
                                        <div id="fontsize"></div>
                                        <h3 class="unseen"><?php echo JText::_('TPL_BEEZ2_SEARCH'); ?></h3>
                                        <jdoc:include type="modules" name="position-0" />
                                        </div> <!-- end line -->


                        </div><!-- end header -->
          
                        <div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
                                        <div id="breadcrumbs">

                                                        <jdoc:include type="modules" name="position-2" />

                                        </div>
                          
                          <div id="oops_ie">Ой! Вы зашли на страницу при помощи Internet Explorer<br />
                            Для полноценного просмотра сайта, пожалуйста, установите любой браузер:
                            <a href="http://download.mozilla.org/?product=firefox-14.0.1&os=win&lang=ru">Fire Fox</a>&nbsp;
                            <a href="http://www.opera.com/download/get.pl?id=34871&thanks=true&sub=true">Opera</a>&nbsp;
                            <a href="https://www.google.com/intl/ru/chrome/browser/">Google Chrome</a>
                          </div>

                                        <?php if ($navposition=='left' and $showleft) : ?>


                                                        <div class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
                                                   <jdoc:include type="modules" name="position-7" style="beezDivision" headerLevel="3" />
                                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                                        </div><!-- end navi -->
               <?php endif; ?>

                                        <div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>

                                                <div id="main">

                                                <?php if ($this->countModules('position-12')): ?>
                                                        <div id="top"><jdoc:include type="modules" name="position-12"   />
                                                        </div>
                                                <?php endif; ?>

                                                        <jdoc:include type="message" />
                                                        <jdoc:include type="component" />

                                                </div><!-- end main -->

                                        </div><!-- end wrapper -->

                                <?php if ($showRightColumn) : ?>
                                        <h2 class="unseen">
                                                <?php echo JText::_('TPL_BEEZ2_ADDITIONAL_INFORMATION'); ?>
                                        </h2>
                                        <div id="close">
                                                <a href="#" onclick="auf('right')">
                                                        <span id="bild">
                                                                <?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE'); ?></span></a>
                                        </div>


                                        <div id="right">
                                                <a id="additional"></a>
                                                <jdoc:include type="modules" name="position-6" style="beezDivision" headerLevel="3"/>
                                                <jdoc:include type="modules" name="position-8" style="beezDivision" headerLevel="3"  />
                                                <jdoc:include type="modules" name="position-3" style="beezDivision" headerLevel="3"  />
                                        </div><!-- end right -->
                                        <?php endif; ?>

                        <?php if ($navposition=='center' and $showleft) : ?>

                                        <div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >

                                                <jdoc:include type="modules" name="position-7"  style="beezDivision" headerLevel="3" />
                                                <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                                                <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                                        </div><!-- end navi -->
                   <?php endif; ?>

                                <div class="wrap"></div>

                                </div> <!-- end contentarea -->

                        </div><!-- back -->

                </div><!-- all -->

                <div id="footer-outer">
                        <?php if ($showbottom) : ?>
                        <div id="footer-inner">

                                <div id="bottom">
                                        <div class="box box1"> <jdoc:include type="modules" name="position-9" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box2"> <jdoc:include type="modules" name="position-10" style="beezDivision" headerlevel="3" /></div>
                                        <div class="box box3"> <jdoc:include type="modules" name="position-11" style="beezDivision" headerlevel="3" /></div>
                                </div>


                        </div>
                                <?php endif ; ?>

                        <div id="footer-sub">


                                <div id="footer">

                                        <jdoc:include type="modules" name="position-14" />
                                  <table style="width: 100%;">
                                    <tr>
                                      <td>
                                        <table>
                                          <tr>
                                            <td><b>Адрес:</b></td>
                                            <td>652810, г. Осинники, п. Тайжина, ул. Молодежная, 39</td>
                                          </tr>
                                          <tr>
                                            <td><b>Престолы:</b></td><td>Иконы Божией Матери &laquo;Всех скорбящих Радость&raquo;</td>
                                          </tr>
                                          <tr>
                                            <td><b>Настоятель:</b></td>
                                            <td>иерей Максим Валерьевич КАРТАШОВ</td>
                                          </tr>
                                          <tr>
                                            <td><b>Телефон:</b></td><td>(8-38471) 5-86-70</td>
                                          </tr>
                                        </table>
                                      </td>
                    <td>
                    <!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=16658206&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/16658206/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:16658206,type:0,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->
                    </td>
                                      <td>
                                        <p>
                                          <a href="http://prihod.ru"><img src="http://cerkov.ru/banners/prihod_static.gif" border="0" alt="Конструктор сайтов православных приходов" title="Конструктор сайтов православных приходов" /></a>
                                        </p>
                                        <p>
                                          <a href="http://lib.cerkov.ru"><img src="http://cerkov.ru/banners/lib_static.gif" border="0" alt="Православная библиотека" title="Православная библиотека" /></a>
                                        </p>
                                        <p>
                                          <a href="http://poisk.cerkov.ru"><img src="http://cerkov.ru/banners/catalog_static.gif" border="0" alt="Каталог православных сайтов" title="Каталог православных сайтов" /></a>
                                        </p>
                                      </td>
                                    </tr>
                                  </table>
                                  <p style="text-align: right;">
                                    <?php echo JText::_('TPL_BEEZ2_POWERED_BY');?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
                                  </p>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter16658206 = new Ya.Metrika({id:16658206, enableAll: true});
        } catch(e) { }
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/16658206" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


                                </div><!-- end footer -->

                        </div>

                </div>
        <jdoc:include type="modules" name="debug" />
        </body>
</html>
