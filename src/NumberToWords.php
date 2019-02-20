<?php

class NumberToWords{
	private $SPACE    = ' ';
	private $DASH     = '-';
	private $UNIT     = array();
	private $WORD     = array();
	function __construct(){
		$this->init();
	}
	private function init(){
		$this->UNIT = array(
			3     => 'thousand',
			6     => 'million',
			9     => 'billion',
			12    => 'trillion',
			15    => 'quadrillion',
			18    => 'quintillion',
			21    => 'sextillion',
			24    => 'septillion',
			27    => 'octillion',
			30    => 'nonillion',
			33    => 'decillion',
			36    => 'undecillion',
			39    => 'duodecillion',
			42    => 'tredecillion',
			45    => 'quattuordecillion',
			48    => 'quindecillion',
			51    => 'sexdecillion',
			54    => 'septendecillion',
			57    => 'octadecillion',
			60    => 'novemdecillion',
			63    => 'vigintillion',
			66    => 'unvigintillion',
			69    => 'duovigintillion',
			72    => 'trevigintillion',
			75    => 'quattuorvigintillion',
			78    => 'quinvigintillion',
			81    => 'sexvigintillion',
			84    => 'septenvigintillion',
			87    => 'octavigintillion',
			90    => 'novemvigintillion',
			93    => 'trigintillion',
			96    => 'untrigintillion',
			99    => 'duotrigintillion',
			);
		$this->WORD = array(
		    0     => 'zero',
		    1     => 'one',
		    2     => 'two',
		    3     => 'three',
		    4     => 'four',
		    5     => 'five',
		    6     => 'six',
		    7     => 'seven',
		    8     => 'eight',
		    9     => 'nine',
		    10    => 'ten',
		    11    => 'eleven',
		    12    => 'twelve',
		    13    => 'thirteen',
		    14    => 'fourteen',
		    15    => 'fifteen',
		    16    => 'sixteen',
		    17    => 'seventeen',
		    18    => 'eighteen',
		    19    => 'nineteen',
		    20    => 'twenty',
		    30    => 'thirty',
		    40    => 'fourty',
		    50    => 'fifty',
		    60    => 'sixty',
		    70    => 'seventy',
		    80    => 'eighty',
		    90    => 'ninety',
		    100   => 'hundred'
		);
	}
	public function convert($number){
	    $output="";
		if(is_numeric($number)){
			$number=str_replace('+', '', $number);
			$number=str_replace('-', '', $number);
			$number=str_replace('.', '', $number);
			$len=strlen($number);
			if($len<=99){
				for($i=$len;$i>0;$i-=3){
					$pos=3*((int)($len/3)-(int)($i/3));
					$start=$i-3;
					$stop=3;
					if($start<0){
						$stop=3+$start;
						$start=0;
					}
					$temp=$this->loop(substr($number,$start,$stop)).$this->SPACE;
					if($i!=$len) $temp.=$this->UNIT[$pos].$this->SPACE;
					$output=$temp.$output;
				}
				return $output;
			}else{
				throw new Exception("too big number, maximum string length is 99", 1);
			}
		}else{
			throw new Exception("not a valid number", 1);
		}
	}
	private function loop($number){
		$number=(int)$number;
	    $output="";
	    if($number<=20){
			$output=$this->WORD[$number];
		}elseif($number<=99){
			$base=10;
			$main=$number/$base;
			$rest=$number%$base;
			$output=$this->WORD[(int)$main*$base];
			if($rest) $output.=$this->DASH.$this->WORD[$rest];
		}else{
			$base=100;
			$main=$number/$base;
			$rest=$number%$base;
			$output=$this->loop((int)$main).$this->SPACE.$this->WORD[$base];
			if($rest) $output.=$this->SPACE.$this->loop($rest);
		}
		return $output;
	}
}
?>