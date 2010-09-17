<?php
/**
 * DokuWiki Starter Template
 *
 * @link   http://dokuwiki.org/template:starter
 * @author Anika Henke <anika@selfthinker.org>
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <?php tpl_metaheaders() ?>
    <link rel="shortcut icon" href="<?php echo DOKU_TPL ?>images/favicon.ico" />
    <?php @include(dirname(__FILE__).'/meta.html') /* include hook */ ?>
</head>

<body>
    <?php @include(dirname(__FILE__).'/topheader.html') /* include hook */ ?>

    <?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
         see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
    <?php /* .dokuwiki should always be in one of the surrounding elements */ ?>
    <div id="dokuwiki__site"><div class="dokuwiki__site dokuwiki mode_<?php echo $ACT ?>">
        <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>

        <!-- HEADER -->
        <div id="dokuwiki__header"><div class="pad">

            <h1 id="dokuwiki__top"><?php tpl_link(wl(),$conf['title'],'id="dokuwiki__top" accesskey="h" title="[H]"') ?></h1>
            <h2>[[<?php tpl_pagetitle($ID) ?>]]</h2>

            <?php /* TODO: skip links
            <ul class="a11y">
                <li><a href="#">skip to nav</a></li>
                <li><a href="#">skip to controls</a></li>
                <li><a href="#">skip to content</a></li>
            </ul>
            <div class="clearer"></div>
            */ ?>

            <!-- AUTH ACTIONS -->
            <div id="dokuwiki__usertools">
                <h3 class="a11y">User Tools</h3> <?php//TODO: localize ?>
                <ul>
                <?php
                     tpl_action('admin',1,'li');
                     tpl_action('profile',1,'li',false,'','',$INFO['userinfo']['name']);
                     tpl_action('login',1,'li');
                ?>
                </ul>
            </div>

            <!-- SITE ACTIONS -->
            <div id="dokuwiki__sitetools">
                <h3 class="a11y">Site Tools</h3> <?php//TODO: localize ?>
                <?php tpl_searchform(); ?>
                <ul>
                    <?php
                         tpl_action('recent',1,'li');
                         tpl_action('index',1,'li');
                    ?>
                </ul>
            </div>

            <?php @include(dirname(__FILE__).'/header.html') /* include hook */ ?>
            <div class="clearer"></div>
            <hr class="a11y" />
        </div></div><!-- /header -->


        <div class="wrapper">
            <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs']){ ?>
              <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
            <?php } ?>
            <?php if($conf['youarehere']){ ?>
              <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
            <?php } ?>

            <div id="dokuwiki__sidebar"><div class="pad include">
                <?php tpl_include_page('sidebar') /* includes the given wiki page */ ?>
                <div class="clearer"></div>
            </div></div><!-- /sidebar -->

            <div id="dokuwiki__content"><div class="pad">
                <?php tpl_flush() /* flush the output buffer */ ?>
                <?php @include(dirname(__FILE__).'/pageheader.html') /* include hook */ ?>

                <div class="page">
                    <!-- wikipage start -->
                    <?php tpl_content() /* the main content */ ?>
                    <!-- wikipage stop -->
                    <div class="clearer"></div>
                </div>

                <?php tpl_flush() ?>
                <?php @include(dirname(__FILE__).'/pagefooter.html') /* include hook */ ?>
            </div></div><!-- /content -->

            <div class="clearer"></div>
            <hr class="a11y" />

            <!-- PAGE ACTIONS -->
            <div id="dokuwiki__pagetools">
                <h3 class="a11y">Page Tools</h3> <?php//TODO: localize ?>
                <ul>
                    <?php
                        tpl_action('edit',1,'li');
                        tpl_action('history',1,'li');
                        tpl_action('backlink',1,'li');
                        tpl_action('subscribe',1,'li');
                        tpl_action('top',1,'li');
                    ?>
                </ul>
            </div>

        </div><!-- /wrapper -->


        <!-- FOOTER -->
        <div id="dokuwiki__footer"><div class="pad">
            <div class="doc"><?php tpl_pageinfo() /* 'Last modified' etc */ ?></div>
            <?php tpl_action('top',1) /* the second parameter switches between a link and a button */ ?>
            <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
        </div></div><!-- /footer -->


    </div></div><!-- /site -->

    <?php //@include(dirname(__FILE__).'/footer.html') /* include hook */ ?>
    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
</body>
</html>
