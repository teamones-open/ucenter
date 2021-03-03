<?php
if (!function_exists('camelize')) {
    /**
     *  下划线转驼峰
     * 思路:
     * step1.原字符串转小写,原字符串中的分隔符用空格替换,在字符串开头加上分隔符
     * step2.将字符串中每个单词的首字母转换为大写,再去空格,去字符串首部附加的分隔符.
     * @param $unCamelizeWords
     * @param string $separator
     * @return string
     */
    function camelize($unCamelizeWords, $separator = '_')
    {
        $unCamelizeWords = $separator . str_replace($separator, " ", strtolower($unCamelizeWords));
        return str_replace(" ", "", ucwords(ltrim($unCamelizeWords, $separator)));
    }
}

if (!function_exists('to_under_score')) {
    /**
     * 驼峰命名转下划线命名
     * @param $str
     * @return string
     */
    function to_under_score($str)
    {
        $dstr = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
            return '_' . strtolower($matchs[0]);
        }, $str);
        return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
    }
}