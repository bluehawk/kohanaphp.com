<div class="span-22 prefix-1 last">
	<h1><?php echo __('How is Kohana Different?') ?></h1>
	<p><?php echo __('Kohana is a <strong>PHP 5 framework</strong> that uses the <strong>Model View Controller</strong> architectural pattern. It aims to be <strong>secure</strong>, <strong>lightweight</strong>, and <strong>easy</strong> to use.
	Although Kohana uses many common design patterns and concepts found in other frameworks, here are some things that make Kohana stand out:') ?></p>
</div>
<div class="span-22 prefix-1 last">
	<div id="cycle" class="swap">
		<ul id="cycle-tabs">
			<li class="first">
				<p><a href="#"><?php echo __('Community Driven') ?></a></p>
			</li>
			<li>
				<p><a href="#"><?php echo __('Strict PHP 5 OOP') ?></a></p>
			</li>
			<li>
				<p><a href="#"><?php echo __('Lightweight') ?></a></p>
			</li>
			<li>
				<p><a href="#"><?php echo __('Flexible') ?></a></p>
			</li>
			<li>
				<p><a href="#"><?php echo __('Easy to Learn') ?></a></p>
			</li>
			<li class="last">
				<p><a href="#"><?php echo __('Multi-Language Support') ?></a></p>
			</li>
		</ul>
		<ul id="cycle-slides">
			<li class="active">
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_community.png" alt="Kohana Community" />
				<h3><?php echo __('Community Driven') ?></h3>
				<p>Kohana development is driven by a team of dedicated people that need a framework for fast, powerful solutions. Kohana development is driven by a team of dedicated people that need a framework for fast, powerful solutions.</p>
				<p>Kohana development is driven by a team of dedicated people that need a framework for fast, powerful solutions.</p>
			</li>
			<li>
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_strictphp.png" alt="Strict PHP 5 OOP" />
				<h3><?php echo __('Strict PHP 5 OOP') ?></h3>
				<p>Offers many benefits: visibility protection, automatic class loading, overloading, interfaces, abstracts, and singletons.</p>
				<p>Offers many benefits: visibility protection, automatic class loading, overloading, interfaces, abstracts, and singletons.</p>
			</li>
			<li>
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_lightweight.png" alt="Lightweight" />
				<h3><?php echo __('Lightweight') ?></h3>
				<p>Kohana has no dependencies on PECL extensions or PEAR libraries.</p>
				<p>The code base is lean and mean, so it's easy to find your way around.</p>
			</li>
			<li>
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_flexible.png" alt="Flexible" />
				<h3><?php echo __('Flexible') ?></h3>
				<p>Almost every part of Kohana can be overloaded or extended without editing core system files.  Modules can be added or created, which add functionility.  You can also transparently extend any class if you need something different.</p>
			</li>
			<li>
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_learn.png" alt="Easy to Learn" />
				<h3><?php echo __('Easy to Learn') ?></h3>
				<p>Kohana was well thought out, and is very easy to learn.  There is great documentation, and if you get stuck, you can ask for help on the forums or in IRC.</p>
			</li>
			<li>
				<img class="addborder" src="<?php echo URL::base(TRUE) ?>media/img/overview_utf8.png" alt="UTF-8 Compatible" />
				<h3><?php echo __('Multi-Language Support') ?></h3>
				<p>All Kohana functions are UTF-8 aware, so Kohana will work anywhere in the world!</p>
			</li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<div class="span-22 prefix-1">
	<hr />
</div>
<div class="span-22 prefix-1">
	<div class="span-14">
		<div class="green-box downloads">
			<h2>Getting Started</h2>
			<p>Kohana has a couple different versions to choose from. <?php echo html::anchor(Route::get('page')->uri(array('lang'=>$request->param('lang'), 'action'=>'versions')),'Which versions should I use?')?></p>
			<div class="download-2x">
				<h4>Kohana 2.x</h4>
				<ul>
					<li>Uses the <abbr title="Model View Controller">MVC</abbr> Pattern</li>
					<li>Powerful Event Handler</li>
					<li>Long Term Support</li>
				</ul>
				<?php echo HTML::anchor
				(
					Route::get('page')->uri(array('lang' => $request->param('lang'), 'action' => 'download')).'?get='.$versions['ko2']['version'],
					'Kohana '.$versions['ko2']['version'],
					array('class' => 'download-button')
				) ?>
			</div>
			<div class="download-3x">
				<h4>Kohana 3.x</h4>
				<ul>
					<li>Uses the <abbr title="Hierarchical Model View Controller">HMVC</abbr> Pattern</li>
					<li>Flexible File System Structure</li>
					<li>Advanced Routing</li>
				</ul>
				<?php echo HTML::anchor
				(
					Route::get('page')->uri(array('lang' => $request->param('lang'), 'action' => 'download')).'?get='.$versions['ko3']['version'],
					'Kohana '.$versions['ko3']['version'],
					array('class' => 'download-button')
				) ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="span-7 prefix-1 last">
		<div class="news tan-box">
			<h2>News From Kohana</h2>
			<ul>
				<li><a href="#">Kohana Joins the Software Freedom...</a></li>
				<li><a href="#">Kohana 2.4.0 Released</a></li>
				<li><a href="#">New Kohana Website</a></li>
				<li><a href="#">New Kohana Website</a></li>
				<li><a href="#">New Kohana Website</a></li>
			</ul>
			<h3>Stay Informed</h3>
			<ul>
				<li><a id="rss_feed" href="#">RSS News Feed</a></li>
				<li id="follow_twitter"><a href="http://twitter.com/kohanaphp">Follow Us on Twitter</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div class="span-22 prefix-1">
	<div id="testimonials" class="span-14">
		<h3>What Developers are Saying</h3>
		<div id="testimonial">
			Kohana is fantastic. I'm in love with PHP again!
			<div class="who">— <a href="http://www.example.com">Random Developer (example.com)</a></div>
		</div>
	</div>
	<div class="span-7 prefix-1 last">
		<h3>Who Uses Kohana?</h3>
		<p>Rotate company logos here...</p>
	</div>
</div>