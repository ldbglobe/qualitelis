<?php
namespace ldbglobe\qualitelis\api;

class Comments {
	var $settings;

	function __construct($default_settings)
	{
		$this->settings = (object)array();
		$this->_default_settings($default_settings);
	}

	private function _default_settings($settings)
	{
		$settings = (object)$settings;

		if(isset($settings->Token))
			$this->settings->Token = $settings->Token;
		if(isset($settings->IdGroupe))
			$this->settings->IdGroupe = $settings->IdGroupe;
		if(isset($settings->IdContractor))
			$this->settings->IdContractor = $settings->IdContractor;
		if(isset($settings->Langue))
			$this->settings->Langue = $settings->Langue;
		if(isset($settings->VisitorLanguage))
			$this->settings->VisitorLanguage = $settings->VisitorLanguage;
	}

	private function _setting($k,$settings,$default=NULL)
	{
		// extract settings from arguments or fallback to internal default settings
		$settings = (object)$settings;

		if(isset($settings->{$k}))
			return $settings->{$k};
		else if(isset($this->settings->{$k}))
			return $this->settings->{$k};
		return null;
	}

	public function Group($settings)
	{
		$Token = $this->_setting('Token',$settings);
		$IdGroupe = $this->_setting('IdGroupe',$settings);
		$IdContractor = $this->_setting('IdContractor',$settings);
		$Langue = $this->_setting('Langue',$settings);
		$VisitorLanguage = $this->_setting('VisitorLanguage',$settings);
		$url = "http://www.qualitelis-survey.com/api/Comments/Group?Token={$Token}&IdGroupe={$IdGroupe}&IdContractor={$IdContractor}&Langue={$Langue}&VisitorLanguage={$VisitorLanguage}";
		return json_decode(file_get_contents($url));
	}
	public function AllPrestaGroup($settings)
	{
		$Token = $this->_setting('Token',$settings);
		$IdGroupe = $this->_setting('IdGroupe',$settings);
		$Langue = $this->_setting('Langue',$settings);
		$VisitorLanguage = $this->_setting('VisitorLanguage',$settings);
		$url = "http://www.qualitelis-survey.com/api/Comments/AllPrestaGroup?Token={$Token}&IdGroupe={$IdGroupe}&Langue={$Langue}&VisitorLanguage={$VisitorLanguage}";
		return json_decode(file_get_contents($url));
	}
}