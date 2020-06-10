<?php
function is_valid_json($string) {
	switch (json_decode($string)) {
		case null:
			return false;
		default:
			return true;
	}
}

function json_bute($json_in) {
/*
	Function from Recursive Design
	http://recursive-design.com/blog/2008/03/11/format-json-with-php/
*/
	$json		 = json_encode($json_in);
    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '	';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {
        $char = substr($json, $i, 1);
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }
        $result .= $char;
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }
        $prevChar = $char;
    }
    return $result;
}

 ?>
