<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Website {

	protected $page_titles = array(
		'home' => 'The Swift PHP Framework',
	);

	public function before()
	{
		parent::before();

		$lang = $this->request->param('lang');

		// Make sure we have a valid language
		if ( ! in_array($lang, array_keys(Kohana::config('kohana')->languages)))
		{
			$this->request->action = 'error';
			throw new Kohana_Request_Exception('Unable to find a route to match the URI: :uri (specified language was not found in config)',
									   array(':uri' => $this->request->uri));
		}

		I18n::$lang = $lang;

		if (isset($this->page_titles[$this->request->action]))
		{
			// Use the defined page title
			$title = $this->page_titles[$this->request->action];
		}
		else
		{
			// Use the page name as the title
			$title = ucwords(str_replace('_', ' ', $this->request->action));
		}

		$this->template->title = $title;

		if ( ! kohana::find_file('views','pages/'.$this->request->action))
		{
			$this->request->action = 'error';
		}
		$this->template->content = View::factory('pages/'.$this->request->action);
		$this->template->set_global('request', $this->request);
		$this->template->meta_tags = array();
	}

	public function action_home()
	{
		$kohana = Kohana::config('kohana');
		$versions['ko2'] = current($kohana['ko2']['release']);
		$versions['ko3'] = current($kohana['ko3']['release']);

		$this->template->content->versions = $versions;
	}

	public function action_download()
	{
		$this->template->content->download_url = FALSE;

		$versions = Kohana_Config::instance()->load('kohana');

		if ($version = Arr::get($_GET, 'get'))
		{
			if (($requested_version = self::multi_array_key_exists($version, $versions)) !== FALSE)
			{
				// Try to start the download
				$this->template->content->download_url = Arr::get($requested_version, 'download');
				$this->template->meta_tags[] = array('http-equiv' => 'refresh', 'content' => '2; '.$requested_version['download']);
			}
		}

		$this->template->content->versions = $versions;
	}

	public function action_error()
	{
		$this->template->title = 'Ooops';
	}

	public function action_documentation() {}

	public function action_community() {}

	public function action_userguide() {}

	public function action_team() {}

	public function action_development() {}

	public function action_help() {}

	public function action_versions() {}

	protected function multi_array_key_exists($needle, $haystack)
	{
		foreach ($haystack as $key => $value)
		{
			if ($needle === $key)
				return $value;

			if (is_array($value))
			{
				if (($value = self::multi_array_key_exists($needle, $value)) !== FALSE)
					return $value;
			}
		}
		return FALSE;
	}

} // End Page