<?php




namespace  MANS;

class A {
    public  $foo;

}
phpinfo();


var_dump(property_exists("A","foo"));
var_dump(property_exists("\\MANS\\A","foo"));

die;
echo pow(2,50);
echo "<br/>";
echo strval(pow(2,50));
echo "<br/>";
phpinfo();


$nwords = array( "zero", "one", "two", "three", "four", "five", "six", "seven",
    "eight", "nine", "ten", "eleven", "twelve", "thirteen",
    "fourteen", "fifteen", "sixteen", "seventeen", "eighteen",
    "nineteen", "twenty", 30 => "thirty", 40 => "forty",
    50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eighty",
    90 => "ninety" );

function int_to_words($x) {
    global $nwords;

    if(!is_numeric($x))
        $w = '#';
    else if(fmod($x, 1) != 0)
        $w = '#';
    else {
        if($x < 0) {
            $w = 'minus ';
            $x = -$x;
        } else
            $w = '';
        // ... now $x is a non-negative integer.

        if($x < 21)   // 0 to 20
            $w .= $nwords[$x];
        else if($x < 100) {   // 21 to 99
            $w .= $nwords[10 * floor($x/10)];
            $r = fmod($x, 10);
            if($r > 0)
                $w .= '-'. $nwords[$r];
        } else if($x < 1000) {   // 100 to 999
            $w .= $nwords[floor($x/100)] .' hundred';
            $r = fmod($x, 100);
            if($r > 0)
                $w .= ' and '. int_to_words($r);
        } else if($x < 1000000) {   // 1000 to 999999
            $w .= int_to_words(floor($x/1000)) .' thousand';
            $r = fmod($x, 1000);
            if($r > 0) {
                $w .= ' ';
                if($r < 100)
                    $w .= 'and ';
                $w .= int_to_words($r);
            }
        } else {    //  millions
            $w .= int_to_words(floor($x/1000000)) .' million';
            $r = fmod($x, 1000000);
            if($r > 0) {
                $w .= ' ';
                if($r < 100)
                    $word .= 'and ';
                $w .= int_to_words($r);
            }
        }
    }
    return $w;
}
$count = 10000235;
echo $count.'There are currently '. int_to_words($count) . ' members logged on.';

die;

function is_countable($word)
{
    return ! in_array(
        strtolower($word),
        array(
            'equipment', 'information', 'rice', 'money',
            'species', 'series', 'fish', 'meta'
        )
    );
}

function singular($str)
{
    $result = strval($str);

    if ( ! is_countable($result))
    {
        return $result;
    }

    $singular_rules = array(
        '/(matr)ices$/'		=> '\1ix',
        '/(vert|ind)ices$/'	=> '\1ex',
        '/^(ox)en/'		=> '\1',
        '/(alias)es$/'		=> '\1',
        '/([octop|vir])i$/'	=> '\1us',
        '/(cris|ax|test)es$/'	=> '\1is',
        '/(shoe)s$/'		=> '\1',
        '/(o)es$/'		=> '\1',
        '/(bus|campus)es$/'	=> '\1',
        '/([m|l])ice$/'		=> '\1ouse',
        '/(x|ch|ss|sh)es$/'	=> '\1',
        '/(m)ovies$/'		=> '\1\2ovie',
        '/(s)eries$/'		=> '\1\2eries',
        '/([^aeiouy]|qu)ies$/'	=> '\1y',
        '/([lr])ves$/'		=> '\1f',
        '/(tive)s$/'		=> '\1',
        '/(hive)s$/'		=> '\1',
        '/([^f])ves$/'		=> '\1fe',
        '/(^analy)ses$/'	=> '\1sis',
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/' => '\1\2sis',
        '/([ti])a$/'		=> '\1um',
        '/(p)eople$/'		=> '\1\2erson',
        '/(m)en$/'		=> '\1an',
        '/(s)tatuses$/'		=> '\1\2tatus',
        '/(c)hildren$/'		=> '\1\2hild',
        '/(n)ews$/'		=> '\1\2ews',
        '/([^us])s$/'		=> '\1'
    );

    foreach ($singular_rules as $rule => $replacement)
    {
        if (preg_match($rule, $result))
        {
            $result = preg_replace($rule, $replacement, $result);
            break;
        }
    }

    return $result;
}



$str = "1";

echo strval($str);
echo "<br/>";

echo singular($str);

die;
chdir(dirname(__FILE__));
echo dirname(__FILE__);
echo "<br/>";
echo 		chdir(dirname(__FILE__));
        echo "<br/>";
        echo getcwd();

die;
if(function_exists("phpversion")){
    echo "The function phpversion() exists;";
}else{
    echo "The function don't exists";
}

echo "<br/>";



if (version_compare(PHP_VERSION, '5.6') >= 0) {
    echo 'I am at least PHP version 7.0.0, my version: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    echo 'I am at least PHP version 5.3.0, my version: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '>=')) {
    echo 'I am at least PHP version 5.0.0, my version: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    echo 'I am still PHP 4, my version: ' . PHP_VERSION . "\n";
}