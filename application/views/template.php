<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Kohana::$charset ?>" />
	<title>Kohana: <?php echo $title ?></title>

	<?php
	echo HTML::style('media/css/screen.css',array('media'=>'screen')), "\n";
	echo HTML::style('media/css/website.css',array('media'=>'screen')), "\n";
	echo HTML::style('media/css/print.css',array('media'=>'print')), "\n";

	echo HTML::script('media/js/jquery-1.3.2.min.js'), "\n";
	echo HTML::script('media/js/jquery.cycle.min.js'), "\n";
	echo HTML::script('media/js/website.js'), "\n";

	// Don't use cufon if the font doesn't support the language
	$cufon_langs = array('en');
	if (in_array(Request::instance()->param('lang'),$cufon_langs))
	{
		echo HTML::script('media/js/cufon-yui.js'), "\n";
		echo HTML::script('media/js/Aller.font.js'), "\n";
		echo "
		<script type='text/javascript'>
			Cufon.replace(' h1,h2,h3,h4,a.button,a.download-button ');
		</script>";
	}
	?>

	<!--[if lt IE 8]>
	<?php echo HTML::script('media/js/IE8.min.js') ?>
	<![endif]-->

	<?php foreach ($meta_tags as $meta)
		echo '<meta'.HTML::attributes($meta).' />' ?>

</head>
<body>
	<div id="topline">
		<ul id="quicklinks">
			<li class="first active"><?php echo HTML::anchor('http://kohanaframework.org', '&nbsp;') ?></li>
			<li><?php echo HTML::anchor('/en/userguide', 'User Guide') ?></li>
			<li><?php echo HTML::anchor('http://forum.kohanaframework.org', 'Forums') ?></li>
			<li><?php echo HTML::anchor('http://dev.kohanaframework.org', 'Development') ?></li>
			<li><?php echo HTML::anchor('http://www.kohanajobs.com', 'Kohana Jobs') ?></li>
		</ul>
	</div>
	<div id="header">
		<div class="container">
			<?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'))), HTML::image('media/img/kohana.png', array('alt' => 'Kohana: Develop Swiftly')), array('id' => 'logo')) ?>
			<div id="menu">
				<ul>
					<?php
					$select = $request->action;
					?>
					<li class="home first<?php echo $select == 'home'?' selected':''?>"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'))), __('Home')) ?></li>
					<li class="download<?php echo $select == 'download'?' selected':''?>"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'), 'action'=>'download')), __('Download')) ?></li>
					<li class="userguide<?php echo $select == 'userguide'?' selected':''?>"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'), 'action'=>'userguide')), __('User Guide')) ?></li>
					<li class="community<?php echo $select == 'community'?' selected':''?>"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'), 'action'=>'community')), __('Community')) ?></li>
					<li class="development last<?php echo $select == 'development'?' selected':''?>"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'), 'action'=>'development')), __('Development')) ?></li>
				</ul>
			</div>
			<?php if (count(Kohana::config('kohana')->languages) > 1): ?>
			<div id="languages">
				<ul>
					<?php
					foreach (Kohana::config('kohana')->languages as $lang => $inf)
					{
						$active = ($lang == $request->param('lang'))?' class="active"':'';
						echo '<li'.$active.'>'.HTML::anchor(Route::get('page')->uri(array('lang'=>$lang, 'action'=>$request->action)), HTML::image('media/img/flags/'.$inf['flag'].'.png',array('alt'=>$inf['name'], 'title'=>$inf['name']))).'</li>';
					}
					?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<div id="content">
		<div class="wrapper">
			<div class="container">
				<?php echo $content ?>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="container">
			<div class="copyright span-6 prefix-1">
				<p class="caps top"><?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'))), 'Kohana', array('class' => 'logo')) ?>
					Copyright &copy;2007-<?php echo date('Y') ?><br/>
					All rights reserved<br/>
					The awesome <?php echo HTML::anchor(Route::get('page')->uri(array('lang' => $request->param('lang'), 'action'=>'team')), 'Kohana Team') ?>
				</p>
			</div>
			<div class="discussions feed span-8">
				<h6 class="caps top"><?php echo __('Latest Discussions') ?></h6>
				<ol>
					<?php echo View::factory('template/feed', array(
					'feed' => 'http://forum.kohanaphp.com/search.php?PostBackAction=Search&Advanced=1&Type=Comments&Feed=RSS2',
					'limit' => 5,
					)) ?>
				</ol>
				<p><?php echo HTML::anchor('http://forum.kohanaphp.com/', 'More discussions') ?> &raquo; </p>
			</div>
			<div class="changes feed span-8 suffix-1 last">
				<h6 class="caps top"><?php echo __('Latest Development') ?></h6>
				<ol>
					<?php echo View::factory('template/feed', array(
					'feed' => 'http://dev.kohanaphp.com/projects/kohana/activity.atom?show_changesets=1',
					'limit' => 5,
					'link' => 'id',
					'more' => 'More development',
					)) ?>
				</ol>
				<p><?php echo HTML::anchor('http://dev.kohanaphp.com/projects/kohana/activity', 'More development') ?> &raquo; </p>
			</div>
		</div>
	</div>

	<!-- Fix Cufon in IE flicker, this should be before the </body> or before any analytics or other external scripts -->
	<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>