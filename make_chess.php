<?php
header("Content-Type: text/html; charset=UTF-8");

function exception_handler(Exception $e){
	echo "<div style='color: red; font-weight: bold; font-size: large;'>Ошибка:<br>".$e->getMessage()."</div>";
};
set_exception_handler('exception_handler');

$max_size = 600;

//Функция которая формирует шахматную доску
function fmake_chess($cols, $rows, $color){
	global $max_size;
	$colors = ["#000000", "#FFFFFF", $color];

	//определяем размер ячейки
	if ($cols>$rows) $col_side = floor($max_size/$cols);
	else  $col_side = floor($max_size/$rows);

	//Формируем шахматную доску из разноцветных div
	$width = $col_side*$cols;
	$height = $col_side*$rows;
	$res = "<div style='border: 1px solid grey; width: {$width}px; height: {$height}px; box-sizing: content-box; position: relative; left:0; right: 0; margin: auto;'>";
	for ($i=0; $i<$rows; $i++){
		for($j=0; $j<$cols; $j++){
			$step = ($i+$j)%3;
			$res .="<div style='width: {$col_side}px; height: {$col_side}px; background-color:{$colors[$step]}; display: inline-block; overflow: hidden;'></div>";
		}
		$res .= "<br>";
	}
	$res .="</div>";
	return $res;
}



ob_start();
$cols = isset($_GET["cols"]) ? $_GET["cols"] : 0;
if (!($cols > 0)) throw new Exception("Не указано количество ячеек по вертикали");
if ($cols > 30) throw new Exception("Не более 30 ячеек по горизонтали");

$rows = isset($_GET["rows"]) ? $_GET["rows"] : 0;
if (!($rows>0)) throw new Exception("Не указано количество ячеек по вертикали");
if ($rows > 30) throw new Exception("Не более 30 ячеек по вертикали");

$color_type = isset($_GET["color_type"]) ? $_GET["color_type"] : 0;
if (!($color_type > 0)) throw new Exception("Не определен формат цвета");

if ($color_type == 1){
	$color = $_GET["color1"];
}
elseif ($color_type == 2){
	$color = "rgb({$_GET["color2"][0]},{$_GET["color2"][1]},{$_GET["color2"][2]})";
}

$res = fmake_chess($cols, $rows, $color);
ob_end_clean();
echo $res;