<?php
/**
 * Gdtstrings Class
 *
 * @package ExpressionEngine
 * @author Richard Whitmer
 * @copyright (c) 2014-2015
 * @license
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @link http://github.com/Panchesco
 * @since Version 2.9
 */
// ------------------------------------------------------------------------
/**
 * Good at Strings Plugin
 *
 * @package		ExpressionEngine
 * @subpackage		third_party
 * @category		Plugin
 * @author		Richard Whitmer
 * @copyright		Copyright (c) 2015 - 2017
 * @link		http://github.com/Panchesco/gdtstrings.git
 */
// ------------------------------------------------------------------------
class Gdtstrings
  {
    public function __construct()
      {
      }
    // ------------------------------------------------------------------------
    /**
     *	Return tagdata as nl2br;
     *	@return string
     */
    public function nl2breakt()
      {
        return nl2br( ee()->TMPL->tagdata );
      }
    // ------------------------------------------------------------------------
    /**
     *	Return tagdata with strip_tags.
     *	@return string
     */
    public function stript()
      {
        $allow = ee()->TMPL->fetch_param( 'allow', '' );
        return strip_tags( ee()->TMPL->tagdata, $allow );
      }
    // ------------------------------------------------------------------------
    /**
     *	Test a regexp is true;
     *	@return integer
     */
    public function regexpt()
      {
        $regex  = ee()->TMPL->fetch_param( 'regex', "" );
        $string = ee()->TMPL->fetch_param( 'string', "" );
        if ( preg_match( $regex, $string ) )
          {
            return "1";
          }
        else
          {
            return "0";
          }
      }
    // ------------------------------------------------------------------------
    /**
     * Perform a str_replace on a string.
     *	
     */
    public function replact()
      {
        $needle      = ee()->TMPL->fetch_param( 'needle' );
        $replacement = ee()->TMPL->fetch_param( 'replacement' );
        return str_replace( $needle, $replacement, ee()->TMPL->tagdata );
      }
    /**
     *	Convert bytes to megabytes.
     */
    public function mbytes()
      {
        return round( ( ee()->TMPL->fetch_param( 'bytes', 0 ) / 1048576 ), 2 );
      }
    /**
     *	Convert bytes to kilobytes.
     */
    public function kbytes()
      {
        return round( ( ee()->TMPL->fetch_param( 'bytes', 0 ) / 1024 ), 2 );
      }
    /**
     *	Convert a string to a lowercase alphadash string.
     *	@return string
     */
    public function slugged()
      {
        $value = ee()->TMPL->fetch_param( 'string', '' );
        $value = strip_tags( $value );
        $value = addslashes( strtolower( $value ) );
        $value = str_replace( ':', '', $value );
        $value = preg_replace( "/-{2,}/", "-", $value );
        $value = preg_replace( "/_{1,}/", "_", $value );
        $value = preg_replace( "/[^[:alnum:]-_]/", "-", $value );
        return $value;
      }
    // ------------------------------------------------------------------------
    /**
     *	Convert a string to uppercase.
     *	@return string
     */
    public function str_to_upper()
      {
        $value = ee()->TMPL->fetch_param( 'string', '' );
        return strtoupper( ee()->TMPL->fetch_param( 'string', '' ) );
      }
    // ------------------------------------------------------------------------
    /**
     * Make a string's first character uppercase.
     * @return string
     */
    public function uc_first()
      {
        $value = ee()->TMPL->fetch_param( 'string', '' );
        return ucfirst( ee()->TMPL->fetch_param( 'string', '' ) );
      }
    // ------------------------------------------------------------------------
    /**
     * Uppercase the first character of each word in a string.
     * @return string
     */
    public function uc_words()
      {
        $value = ee()->TMPL->fetch_param( 'string', '' );
        return ucwords( ee()->TMPL->fetch_param( 'string', '' ) );
      }
    // ------------------------------------------------------------------------/**
    /**
     *	Return trunctated version of string.
     */
    public function trunct()
      {
        $ellipsis = ee()->TMPL->fetch_param( "ellipsis", '...' );
        $chars    = ee()->TMPL->fetch_param( "chars", '72' );
        $str      = ee()->TMPL->tagdata;
        $str      = strip_tags( $str );
        $str      = trim( $str );
        if ( strlen( $str ) > $chars )
          {
            return substr( $str, 0, $chars ) . $ellipsis;
          }
        else
          {
            return substr( $str, 0, $chars );
          }
      }
  }
/* End of file pi.gdtstrings.php */
/* Location: ./system/user/addons/gdtstrings/pi.gdtstrings.php */