<?php
$result = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = <sup>-</sup>b &#177; &radic;<font style='text-decoration: overline;'> b</font><sup>2</sup><font style='text-decoration: overline;'> - 4ac</font></td></tr><tr style='text-align:center;'><td>2a</td></tr></table>";
require_once('include/TinyAjax.php');

function calc($a, $b, $c) {
	if(is_numeric("$a") && is_numeric("$b") && is_numeric("$c")){
		// a, b, and c are all numeric
		echo "<b>Equation:</b> ($a)x<sup>2</sup> + ($b)x + ($c)<br/>";
		
		$sqrt = pow($b,2) - 4 * $a * $c;
		$dvb = 2 * ($a);
		$b2 = $b * -1;
		
		$x1 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = <sup>-</sup>($b) + &radic;<font style='text-decoration: overline;'> ($b)</font><sup>2</sup><font style='text-decoration: overline;'> - 4($a)($c)</font></td></tr><tr style='text-align:center;'><td>2($a)</td></tr></table><b><i>And</i></b>";

		$x2 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = <sup>-</sup>($b) - &radic;<font style='text-decoration: overline;'> ($b)</font><sup>2</sup><font style='text-decoration: overline;'> - 4($a)($c)</font></td></tr><tr style='text-align:center;'><td>2($a)</td></tr></table>";
		echo "<hr/><br/>$x1<br/>$x2<br/><br/>";

		$x1_2 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = $b2 + &radic;<font style='text-decoration: overline;'> $sqrt</font></td></tr><tr style='text-align:center;'><td>$dvb</td></tr></table><b><i>And</i></b>";

		$x2_2 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = $b2 - &radic;<font style='text-decoration: overline;'> $sqrt</font></td></tr><tr style='text-align:center;'><td>$dvb</td></tr></table>";
		echo "<hr/>$x1_2<br/>$x2_2";
		
		if($sqrt > 0 || $sqrt == 0){
			$sqrt_s = sqrt($sqrt);
			$eq_t_1 = $b2 + $sqrt_s;
			$eq_t_2 = $b2 - $sqrt_s;
			
			$sol_1 = $eq_t_1 / $dvb;
			$sol_2 = $eq_t_2 / $dvb;

			$x1_2 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = $eq_t_1</td></tr><tr style='text-align:center;'><td>$dvb</td></tr></table><b><i>And</i></b>";
			
			$x2_2 = "<table border='0px'><tr style='text-align:center;'><td style='border-bottom:1px solid #000000;'>x = $eq_t_2</td></tr><tr style='text-align:center;'><td>$dvb</td></tr></table>";

			echo "<hr/>$x1_2<br/>$x2_2";
			echo "<hr/><b>Solutions:</b><br/>x = $sol_1";
			if($sqrt != 0){
				echo " <b><i>And</i></b> x = $sol_2";
			}
		}else{
			echo "Equation has no real roots!";
		}
	}else{
		// a, b, and c are not numeric
		echo "Please give a,b, and c numeric values and try again!";
	}
}

$ajax = new TinyAjax();
$ajax->showLoading();
$ajax->exportFunction("calc", array("input_a", "input_b", "input_c"), "#result");
$ajax->process();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang=en-CA>
<head>
	<title>Quadratic Equation Calculator</title>
	<link rev="made" href="mailto:webmaster@formulationx.com">
	<link rel="shortcut icon" href="math_php.ico" type="image/x-icon" />
	<meta name="keywords" content="simultaneous, equation, calculator, math">
	<meta name="description" content="This Quadratic Equation calculator takes finds the roots of any equation in the form ax<sup>2</sup>+bx+c.">
	<meta name="author" content="formulationx">
	<meta name="robots" content="all">
	<? $ajax->drawJavaScript(); ?>
</head>
<body>
	<h2>Quadratic Equation Calculator</h2>
	<div id="about" style="background-color: #eee;">
		<p>This Quadratic Equation calculator takes finds the roots of any equation in the form ax<sup>2</sup>+bx+c.<br/>
		See <a href='http://en.wikipedia.org/wiki/Quadratic_equation' target='_blank'>Wikipedia</a> for more details on <a href='http://en.wikipedia.org/wiki/Quadratic_equation' target='_blank'>Quadratic Equations</a>.</p>
		<p>You might also like the <a href='math.php'>Simultaneous Equation Calculator</a></p>
	</div>

	<div id="input" style="background-color: #eee;">
	<h4>Input:</h4>

		<form method="post" action="javascript:void(0)" onsubmit="calc()">
		<b>Equation:</b> ax<sup>2</sup> + bx + c<br/>
		<b>a =</b> <input type='text' value='a' size='5' id='input_a' name='input' onfocus='this.select();'; /><br/>
		<b>b =</b> <input type='text' value='b' size='5' id='input_b' name='input' onfocus='this.select();'; /><br/>
		<b>c =</b> <input type='text' value='c' size='5' id='input_c' name='input' onfocus='this.select();'; /><br/>
		<input type="submit" value="Solve">
		</form>
	</div>
	<div style="background-color: #eee;"><font size='3pt'><b>Output:</b></font></div>
	<div id="result" style="background-color: #eee;">&nbsp;<?=$result;?></div>
</body>
</html>