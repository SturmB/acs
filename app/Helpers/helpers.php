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