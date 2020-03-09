<?php
//$smartUrl = new SmartUrl('http://www.tifen.info/web');

//apply in button links in reloading div tags
//echo SmartUrl::buildLink('http://www.tifen.info/public','admin.php', 'click here for code example' ,'id=124,status=print');
	/*
	public static function buildLink($baseUrl, $file, $text ,$parameterList){}
	$file = 
	$text =
	*/
	

class SmartUrl{
	//file
	private $m_file = '';
	public function setFile($value){
		$this ->m_file = $value;
	}
	public function getFile(){
		return $this->m_file;
	}
	//text
	private $m_text = '';
	public function setText($value){
		$this ->m_text = $value;
	}
	public function getText(){
		return $this->m_text;
	}
	//internal variables
	private $m_baseUrl = '';
	private $m_parameters = array();
	//constructor
	function __construct($baseUrl){
		$this->m_baseUrl=$baseUrl;
	}
	//add parameter
	public function addParameter($parameterKey, $parameterValue){
			$this->m_parameters[$parameterKey] = $parameterValue;
	}
	//render
	public function render(){
		$r = '';
		//variables
		$baseUrl = $this->m_baseUrl;
		$parameters = $this->m_parameters;
		$file = $this->m_file;
		//build it
		if(trim($file)!=''){
			$r .= $baseUrl . '/' . $file;
		} else {
			$r .= $baseUrl;
		}
		//add the parameters
		if(count($parameters)>0){
			$r .= '?';
			$index = 0;
			foreach ($parameters as $parameterKey=>$parameterValue) {
				//add & if not first time
				if($index>=1){
					$r .= '&';
				}
				//build
				$r .= $parameterKey . '=' . $parameterValue;
				$index++;
			}
		}
		
		return $r;
	}
	public function renderLink(){
		$r = '';
		//variables
		$url = $this->render();
		$text = $this->m_text;
		//define what to print as the text
		if (trim($text) == ''){
			$textToDisplay = $url;
		} else {
			$textToDisplay = $text;
		}
		//build the link
		$r .= '<a href="' . $url . '">' . $textToDisplay . '</a>';
		return $r;
	}
//method:
	//public static function buildLink($baseUrl, $file, $text ,$parameterList){
		public static function buildLink($baseUrl, $file, $text ){
	
		$r = '';
		//build the object
		$smartUrl = new SmartUrl($baseUrl);
		$smartUrl->setFile($file);
		$smartUrl->setText($text);
		//add parameters from parameter list: e.g. "id=124,status=print"
	/*
		$parameterPairs = explode(',', $parameterList);
		if(count($parameterPairs) > 0){
			foreach($parameterPairs as $parameterPair){
				//variables
				$parts = explode('=', $parameterPair);
				$key = $parts[0];
				$value = $parts[1];
				//add the key and value as a parameter
				$smartUrl->addParameter($key, $value);
			}
		}
	*/
	//render it to the outgoing variable
	$r .= $smartUrl->renderLink();;
	return $r;	
	}	
}