<?php 
/**
* 
*/
class Controller_Test extends Controller
{

	public function action_index()
	{
		$operator = array('+', '-', '*');
		$sign = array_rand($operator);
		$sign = $operator[$sign];

		if($sign == '*'){
			$max = 9;
		}else{
			$max = 20;
		}

		$num1 = rand(2, $max);
		$num2 = rand(2, $max);		
		

		if($sign == '-' && $num1 < $num2){
			$num1 = $num2 + rand(1, 9);
		}

		if($sign == '*' && $num2 < 1){
			$num2 = rand(2, 9);
		}

		switch ($sign) {
			case '*':
				$result = $num1 * $num2;				
				break;

			case '-':
				$result = $num1 - $num2;
				break;
			
			default:
				$result = $num1 + $num2;
				break;
		}

		$data = array(
			'num1'=>$num1,			
			'num2'=>$num2,
			'sign'=>$sign,			
		);

		// exit("$num1 $sign $num2 = $result");

		Session::set('security_code', $result);
		return View::forge('test/index', $data, false);
		
	}	
	
}