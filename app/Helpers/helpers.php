<?php
/**
 * Created by PhpStorm.
 * User: apache
 * Date: 3/7/18
 * Time: 2:55 PM
 */

if (! function_exists('auto_copyright')) {
    /**
     * Automatic copyright year. (Thanks to CSS-Tricks!)
     * https://css-tricks.com/snippets/php/automatic-copyright-year/
     *
     * @param string $year
     * @return false|int|string
     */
    function auto_copyright($year = 'auto')
    {
            $returnval = '';

            if (intval($year) == 'auto') {
                $year = date('Y');
            }

            if (intval($year) == date('Y')) {
                $returnval = intval($year);
            }
            if (intval($year) < date('Y')) {
                $returnval = intval($year) . ' &ndash; ' . date('Y');
            }
            if (intval($year) > date('Y')) {
                $returnval = date('Y');
            }

            return $returnval;
    }
}

if (! function_exists('shadeColor2')) {
    /**
     * Thanks for this function go to "Pimp Trizkit." More info:
     * http://stackoverflow.com/questions/5560248/programmatically-lighten-or-darken-a-hex-color-or-rgb-and-blend-colors
     *
     * @param $color
     * @param $percent
     * @return string
     */
    function shadeColor2($color, $percent) {
        $color = str_replace("#", "", $color);
        $t=$percent<0?0:255;
        $p=$percent<0?$percent*-1:$percent;
        $RGB = str_split($color, 2);
        $R=hexdec($RGB[0]);
        $G=hexdec($RGB[1]);
        $B=hexdec($RGB[2]);
        return '#'.substr(dechex(0x1000000+(round(($t-$R)*$p)+$R)*0x10000+(round(($t-$G)*$p)+$G)*0x100+(round(($t-$B)*$p)+$B)),1);
    }
}