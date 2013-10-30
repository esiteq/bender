<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * 
 * Smarty {bender} function plugin
 *
 * Type:     function<br>
 * Name:     bender<br>
 * Date:     October 27, 2013<br>
 * Purpose:  combines and compresses javascript & css<br>
 * Input:
 *         - src    = path to javascript or css file (can be an array)
 *         - output = path to output js / css file (optional)
 *         - dev    = development mode (js / css "as is", no joining / compression)
 *         - minify = true | false - minify results (default is true)
 *
 * Examples:<br>
 * <pre>
 * {bender src="templates/default/css/style-main.css"} // add first css file
 * {bender src="templates/default/css/style-additional.css"} // add second css file
 * {bender src="templates/default/js/jquery.js"}             // add first javascript file
 * {bender src="templates/default/js/bootstrap.js"}          // add second javascript file
 * {bender output="css/allcss.min.css"} // combine previously added css files, minify and put them into css/allcss.min.css, and insert link to result css file
 * {bender output="js/alljs.min.js"}    // combine previously added js files, minify and put them into js/alljs.min.css, and insert link to result js file
 * </pre>
 * @link http://smarty.php.net/manual/en/language.function.cycle.php {cycle}
 *       (Smarty online manual)
 * @author Alex Raven <bugrov at gmail dot com>
 * @version 0.1
 * @param array
 * @param Smarty
 * @return string|null
 */

function smarty_function_bender( $params, &$smarty )
{
    $bender = new Bender();
    $src = isset( $params['src'] ) ? $params['src'] : "";
    $output = isset( $params['output'] ) ? $params['output'] : "";
    // enqueue javascript or css
    if ( $src )
    {
        $bender->enqueue( $src );
    }
    elseif ( $output )
    {
        return $bender->output($output);
    }
}
?>