<?php

// Displayed feeds are cached for 5 minutes
if ( ! Fragment::load('feed:'.$feed.':'.$limit, Date::MINUTE * 5)):

// Parse the feed
$items = Feed::parse($feed, $limit);

// Set the "link" and "title" variable names
isset($link)  or $link  = 'link';
isset($title) or $title = 'title';

foreach ($items as $item)
{
	
	// Clean the title so no one can inject anything
	$clean = html::chars($item[$title]);
	// Shorten it to 50 characters, but don't cut words in half, add 2 so that if the 51st char is a space, it will grab the 52nd character, and the word its attached to, so that the strrpos below works.
	$short = Text::limit_chars($clean,52,false,true);
	// If the string is longer than 50 chars, cut off the leftover workd from limit_chars, and append '...'
	if (strlen($short) > 50)
	{
		$short = substr($short,0,strrpos($short,' ')) . '&#8230;';
	}
	// At this point, $short is at MAX 51 characters (50 characters of the string + "..."), usually less, because its rare for the words to line up exactly with the 50th character.
	
	echo '<li>'.HTML::anchor($item[$link], $short ,array('title'=>$clean)).'</li>';
}
?>
<?php Fragment::save(); endif ?>