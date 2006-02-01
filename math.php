<?php
	require_once('include/TinyAjax.php');

	function calc($one_1, $one_2, $one_3, $one_4, $two_1, $two_2, $two_3, $two_4) {
		function calc_($one_1, $one_2, $one_3, $two_1, $two_2, $two_3) {
			$equation1 = $one_1."x + ".$one_2."y = $one_3";
			$equation2 = $two_1."x + ".$two_2."y = $two_3";

			$x_equation1 = $one_1;
			$y_equation1 = $one_2;
			$A_equation1 = $one_3;

			$x_equation2 = $two_1;
			$y_equation2 = $two_2;
			$A_equation2 = $two_3;

			$x_equation3 = $one_1+$two_1;
			$y_equation3 = $one_2+$two_2;
			$A_equation3 = $one_3+$two_3;

			if($x_equation3 == "0" && $y_equation3 == "0"){
				return "<b>x</b> and <b>y</b> can not both cancel out when the two equations are added!";
			}elseif($x_equation3 != "0" && $y_equation3 != "0"){
				return "Ether <b>x</b> or <b>y</b> have to cancel out when the two equations are added!";
			}else{
				if($x_equation3 == "0"){
					$equation3_1 = $y_equation3."y = $A_equation3";
					$y = $A_equation3/$y_equation3;

					$answer_equation1 = $y_equation1*$y." + ".$x_equation1."x = ".$A_equation1;
					$answer_equation1_y = $y_equation1*$y;
					$answer_equation1 = $x_equation1."x = ".$A_equation1." - ".$answer_equation1_y;
					$answer_equation1_rs = $A_equation1 - $answer_equation1_y;
					$answer_equation1_ls = $x_equation1;
					$answer_equation1 = $answer_equation1_ls."x = ".$answer_equation1_rs;
					$x = $answer_equation1_rs/$answer_equation1_ls;
				}elseif($y_equation3 == "0"){
					$equation3_1 = $x_equation3."x = $A_equation3";
					$x = $A_equation3/$x_equation3;
		
					$answer_equation1 = $x_equation1*$x." + ".$y_equation1."y = ".$A_equation1;
					$answer_equation1_x = $x_equation1*$x;
					$answer_equation1 = $y_equation1."y = ".$A_equation1." - ".$answer_equation1_x;
					$answer_equation1_rs = $A_equation1 - $answer_equation1_x;
					$answer_equation1_ls = $y_equation1;
					$answer_equation1 = $answer_equation1_ls."y = ".$answer_equation1_rs;
					$y = $answer_equation1_rs/$answer_equation1_ls;
				}

				$equation1 = $x_equation1."x + ".$y_equation1."y = $A_equation1";
				$equation2 = $x_equation2."x + ".$y_equation2."y = $A_equation2";
				$equation3 = $x_equation3."x + ".$y_equation3."y = $A_equation3";

				$return = "
					<b>Equation1:</b> $equation1<br/>
					<b>Equation2:</b> $equation2<hr/>
					<b>Equation3:</b> $equation3<hr/>
					<b>Equation3:</b> $equation3_1<hr/>
					x = $x<br/>
					y = $y
				";
				return $return;
			}
		}

		$equation1 = "$one_1$one_2$one_3$one_4";
		$equation2 = "$two_1$two_2$two_3$two_4";

		$return = "$equation1<br/>$equation2";

		if(!strstr($one_1,"x")&&!strstr($one_1,"y")&&!strstr($one_1,"=")){
			$A_e1 = $one_1;
		}elseif(!strstr($one_2,"x")&&!strstr($one_2,"y")&&!strstr($one_2,"=")){
			$A_e1 = $one_2;
		}elseif(!strstr($one_3,"x")&&!strstr($one_3,"y")&&!strstr($one_3,"=")){
			$A_e1 = $one_3;
		}elseif(!strstr($one_4,"x")&&!strstr($one_4,"y")&&!strstr($one_4,"=")){
			$A_e1 = $one_4;
		}

		if(!strstr($two_1,"x")&&!strstr($two_1,"y")&&!strstr($two_1,"=")){
			$A_e2 = $two_1;
		}elseif(!strstr($two_2,"x")&&!strstr($two_2,"y")&&!strstr($two_2,"=")){
			$A_e2 = $two_2;
		}elseif(!strstr($two_3,"x")&&!strstr($two_3,"y")&&!strstr($two_3,"=")){
			$A_e2 = $two_3;
		}elseif(!strstr($two_4,"x")&&!strstr($two_4,"y")&&!strstr($two_4,"=")){
			$A_e2 = $two_4;
		}

	//FIND X
	if(strstr($one_1,"x")){
		$x_e1 = $one_1;
	}elseif(strstr($one_2,"x")){
		$x_e1 = $one_2;
	}elseif(strstr($one_3,"x")){
		$x_e1 = $one_3;
	}elseif(strstr($one_4,"x")){
		$x_e1 = $one_4;
	}

	if(strstr($two_1,"x")){
		$x_e2 = $two_1;
	}elseif(strstr($two_2,"x")){
		$x_e2 = $two_2;
	}elseif(strstr($two_3,"x")){
		$x_e2 = $two_3;
	}elseif(strstr($two_4,"x")){
		$x_e2 = $two_4;
	}

	//FIND Y
	if(strstr($one_1,"y")){
		$y_e1 = $one_1;
	}elseif(strstr($one_2,"y")){
		$y_e1 = $one_2;
	}elseif(strstr($one_3,"y")){
		$y_e1 = $one_3;
	}elseif(strstr($one_4,"y")){
		$y_e1 = $one_4;
	}

	if(strstr($two_1,"y")){
		$y_e2 = $two_1;
	}elseif(strstr($two_2,"y")){
		$y_e2 = $two_2;
	}elseif(strstr($two_3,"y")){
		$y_e2 = $two_3;
	}elseif(strstr($two_4,"y")){
		$y_e2 = $two_4;
	}

	//FIND THE = SIGN
	if(strstr($one_1,"=")){
		$equals_e1 = $one_1;
	}elseif(strstr($one_2,"=")){
		$equals_e1 = $one_2;
	}elseif(strstr($one_3,"=")){
		$equals_e1 = $one_3;
	}elseif(strstr($one_4,"=")){
		$equals_e1 = $one_4;
	}

	if(strstr($two_1,"=")){
		$equals_e2 = $two_1;
	}elseif(strstr($two_2,"=")){
		$equals_e2 = $two_2;
	}elseif(strstr($two_3,"=")){
		$equals_e2 = $two_3;
	}elseif(strstr($two_4,"=")){
		$equals_e2 = $two_4;
	}


	if($x_e1 == "x" || $x_e1 == "+x" || $x_e1 == "-x"){
		$x_e1 = str_replace("x","1x",$x_e1);
	}
	if($y_e1 == "y" || $y_e1 == "+y" || $y_e1 == "-y"){
		$y_e1 = str_replace("y","1y",$y_e1);
	}

	if($x_e2 == "x" || $x_e2 == "+x" || $x_e2 == "-x"){
		$x_e2 = str_replace("x","1x",$x_e2);
	}
	if($y_e2 == "y" || $y_e2 == "+y" || $y_e2 == "-y"){
		$y_e2 = str_replace("y","1y",$y_e2);
	}

	$x_e1 = str_replace("x","",$x_e1);
	$y_e1 = str_replace("y","",$y_e1);

	$x_e2 = str_replace("x","",$x_e2);
	$y_e2 = str_replace("y","",$y_e2);


	$one_1 = $x_e1;
	$one_2 = $y_e1;
	$one_3 = $A_e1;
	$two_1 = $x_e2;
	$two_2 = $y_e2;
	$two_3 = $A_e2;

	$equation1 = "$x_e1 + $y_e1 $equals_e1 $A_e1";
	$equation2 = "$x_e2 + $y_e2 $equals_e2 $A_e2";

	$return .= "<br/><br/>$equation1<br/>$equation2<br/>";

	$return .= $x_e1+$x_e2;
	$return .= "x + ";
	$return .= $y_e1+$y_e2;
	$return .= "y = ";
	$return .= $A_e1+$A_e2;

	//return $return;
	//return ("$equation1<br/>$equation2");
	return calc_($one_1, $one_2, $one_3, $two_1, $two_2, $two_3);
}

$ajax = new TinyAjax();
$ajax->showLoading();
$ajax->exportFunction("calc", array("input_1_1", "input_1_2", "input_1_3", "input_1_4", "input_2_1", "input_2_2", "input_2_3", "input_2_4"), "#result");
$ajax->process();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang=en-CA>
<head>
	<noscript><meta http-equiv="Refresh" content="4;url=math_.php"></noscript>
	<title>Simultaneous Equation Calculator</title>
	<link rev="made" href="mailto:webmaster@formulationx.com">
	<link rel="shortcut icon" href="math_php.ico" type="image/x-icon" />
	<meta name="keywords" content="simultaneous, equation, calculator, math">
	<meta name="description" content="This Simultaneous Equation Calculator takes your two equations and, using the elimination method, calulates what x and y equal.">
	<meta name="author" content="formulationx">
	<meta name="robots" content="all">
	<? $ajax->drawJavaScript(); ?>
</head>
<body>
	<h2>Simultaneous Equation Calculator</h2>
	<div id="about" style="background-color: #eee;">
		<p>This Simultaneous Equation Calculator takes your two equations and, using the elimination method, calulates what x and y equal.<br/>
		See <a href='http://en.wikipedia.org/wiki/Simultaneous_equations#Elimination_method' target='_blank'>Wikipedia</a> for more details on this method and on <a href='http://en.wikipedia.org/wiki/Simultaneous_equations' target='_blank'>Simultaneous Equations</a>.</p>
		<p>You might also like the <a href='math2.php'>Quadratic Equation Calculator</a></p>
	</div>

	<div id="input" style="background-color: #eee;">
		<h4>Input:</h4>

		<form method="post" action="javascript:void(0)" onsubmit="calc()">
		Equations must be typed in the following format:<br/>
		x + y = z<br/>
		-x + 2y = v<br/><br/>

		Equation 1:<br/>
		<input type='text' value='-3x' size='1' id='input_1_1' name='input_1_1' />
		<input type='text' value='+y' size='1' id='input_1_2' name='input_1_2' />
		<input type='text' value='=' size='1' id='input_1_3' name='input_1_3' />
		<input type='text' value='13' size='1' id='input_1_4' name='input_1_4' /><br/>

		Equation 2:<br/>
		<input type='text' value='2x' size='1' id='input_2_1' name='input_2_1' />
		<input type='text' value='-y' size='1' id='input_2_2' name='input_2_2' />
		<input type='text' value='=' size='1' id='input_2_3' name='input_2_3' />
		<input type='text' value='-9' size='1' id='input_2_4' name='input_2_4' /><br/>

		<input type="submit" value="Calculate">
		</form>
	</div>
	<div style="background-color: #eee;"><font size='3pt'><b>Output:</b></font></div>
	<div id="result" style="background-color: #eee;">&nbsp;<?=$result;?></div>
</body>
</html>