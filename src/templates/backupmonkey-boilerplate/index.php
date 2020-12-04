<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');

$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Generator tag
$this->setGenerator(null);

// Add Stylesheets
unset($this->_scripts[$this->baseurl . '/media/system/js/caption.js']);

if (isset($this->_script['text/javascript']))
{
    $this->_script['text/javascript'] = preg_replace('%jQuery\(window\).on\(\'load\',\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\)\;\s*\}\)\;\s*%', '', $this->_script['text/javascript']);

    if (empty($this->_script['text/javascript']))
    {
        unset($this->_script['text/javascript']);
    }
};

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=3">
    <jdoc:include type="head" />
    <link rel="icon" type="image/svg+xml" href="<?php echo 'templates/' . $this->template . '/'; ?>/favicon.svg" sizes="any">
    <?php if(empty($_SERVER['HTTP_X_INLINE_STYLES']) || $_SERVER['HTTP_X_INLINE_STYLES'] !== 'false'): ?>
    <style>
        <?php echo file_get_contents(dirname(__FILE__) . "/css/critical.css"); ?>
    </style>
    <?php else: ?>
        <link href="<?php echo 'templates/' . $this->template . '/css/critical.css?v=' . md5(file_get_contents(dirname(__FILE__) . "/css/critical.css")); ?>" rel="stylesheet" type="text/css" />
     <?php endif; ?>
</head>
<body class="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
    <header>
    </header>
    <main>
        <h1>Hello Monkey 👋</h1>
        <jdoc:include type="message" />
        <jdoc:include type="component" />
        <?php if ($this->countModules( 'example_position' )) : ?>
            <jdoc:include type="modules" name="example_position" />
        <?php endif; ?>
    </main>
    <footer>
    </footer>
    <jdoc:include type="modules" name="debug" />
    <link href="<?php echo 'templates/' . $this->template . '/css/template.css?v=' . md5(file_get_contents(dirname(__FILE__) . "/css/template.css")); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.min.js?v=<?php echo md5(file_get_contents(dirname(__FILE__) . "/js/template.min.js")); ?>"></script>
</body>
</html>
