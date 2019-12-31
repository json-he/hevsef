<?php
function lengthestNonRepeatingStringSubstring(string $str)
{
// 将字符串拆分成数组
$bytes = getBytes($str);

$lastMap   = [];
$start     = 0;
$maxLength = 0;

foreach ($bytes as $index => $byte) {
if (isset($lastMap[$byte]) && $lastMap[$byte] > $start) {
$start = $lastMap[$byte] + 1;
}

if ($index - $start + 1 > $maxLength) {
$maxLength = $index - $start + 1;
}

$lastMap[$byte] = $index;
}

return $maxLength;
}

function getBytes( $str)
{
// 为了兼容中文，字符串分割不能使用 PHP 内置的 str_split，
// 因为它分割的是 ASSIC 码，一个中文会被分割成 3 个 ASSIC 码，就变成乱码了
return preg_split('/(?<!^)(?!$)/u', $str);
}

echo lengthestNonRepeatingStringSubstring("Hello World");