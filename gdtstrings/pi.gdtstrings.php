<?php
/**
* Gdtstrings Class
*
* @package ExpressionEngine
* @author Richard Whitmer/Godat Design, Inc.
* @copyright (c) 2014, Godat Design, Inc.
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
* @link http://godatdesign.com
* @since Version 2.9
*/
 
 // ------------------------------------------------------------------------

/**
 * Good at Strings Plugin
 *
 * @package		ExpressionEngine
 * @subpackage		third_party
 * @category		Plugin
 * @author		Richard Whitmer/Godat Design, Inc.
 * @copyright		Copyright (c) 2014, Godat Design, Inc.
 * @link		http://godatdesign.com
 */
  
 // ------------------------------------------------------------------------

	$plugin_info = array(
	    'pi_name'         => 'Good at Strings',
	    'pi_version'      => '1.0.1',
	    'pi_author'       => 'Richard Whitmer/Godat Design, Inc.',
	    'pi_author_url'   => 'http://godatdesign.com/',
	    'pi_description'  => '
	    Access to PHP string functions in templates.
	    ',
	    'pi_usage'        => Gdtstrings::usage()
	);
	

	class  Gdtstrings {
			
			public function __construct()
			{
				
			}
			
			// ------------------------------------------------------------------------
			
			
			/**
			 *	Return tagdata with strip_tags.
			 *	@return string
			 */
			 public function stript()
			 {
				$allow = ee()->TMPL->fetch_param('allow','');
				return strip_tags(ee()->TMPL->tagdata,$allow);
			 }
			 
			 
			  // ------------------------------------------------------------------------
			  
			  /**
			   *	Test a regexp is true;
			   *	@return integer
			   */
			   public function regexpt()
			   {
				  
				   $regex		= ee()->TMPL->fetch_param('regex',"");
				   $string		= ee()->TMPL->fetch_param('string',"");
				  
				   if(preg_match($regex,$string))
				   {
					   return "1";
				   } else {
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
				   
				   	$needle			= ee()->TMPL->fetch_param('needle');
					 	$replacement	=	ee()->TMPL->fetch_param('replacement');
				   
				   return str_replace($needle, $replacement, ee()->TMPL->tagdata);
			   }
			   
			   /**
			    *	Convert bytes to megabytes.
			    */
			    public function mbytes()
			    {
				    return round((ee()->TMPL->fetch_param('bytes',0) / 1048576),2);
			    }
			   
			   
			   /**
			    *	Convert bytes to kilobytes.
			    */
			    public function kbytes()
			    {
				    return round((ee()->TMPL->fetch_param('bytes',0) / 1024),2);
			    }
			    
			    
			    /**
			    *	Convert a string to a lowercase alphadash string.
			    *	@return string
			    */
			    public function slugged()
			    {
			    	
				    $value	= ee()->TMPL->fetch_param('string','');
				    $value	= strip_tags($value);
				    $value	= addslashes(strtolower($value));
				    $value	= str_replace(':','',$value);
				    $value	= preg_replace("/-{2,}/","-",$value);
				    $value	= preg_replace("/_{1,}/","_",$value);
				    $value	= preg_replace("/[^[:alnum:]-_]/","-",$value);
				    
				    return $value;
				    
			    }
			    
			
			// ------------------------------------------------------------------------
			
			/**
			 *	Return plugin usage documentation.
			 *	@return string
			 */
			static function usage()
			{
				
					ob_start();  ?>
					
					
					SINGLE TAGS:
					----------------------------------------------------------------------------
					regexpt - Test if a regular expression is true. 
					Returns a 1 if true; 0 if false;
					
					Example:
					{exp:gdtstrings:regexpt string="Short string to check against" regex="/[0-9]{1,}/"} 
					
					returns 0
					
					
					{exp:gdtstrings:regexpt string="One (1) string to check against" regex="/[0-9]{1,}/"}
					
					returns 1
					...
					
					slugged - Converts a string to a lowercase alphadash string.
					
					Example: 
					{exp:gdtsrings:slugged string="String to make into slug"} 
					
					Returns: 
					string-to-make-into-slug
					
					...
					
					kbytes - Converts bytes to kilobytes
					
					...
					
					mbytes - Converts bytes to megabytes
					
					...

					
					TAG PAIRS:
					----------------------------------------------------------------------------
					
					Strip HTML from text between tags
					
					{exp:gdtstrings:stript allow="br"}
						<p>Apply PHP strip_tags function to tagdata text.</p>
					{/exp:gdtstrings:stript}
					
					Optional parameter: Tags to allow eg. <br>
					
					...
					
					Replace a string of text whereever it occurs between tags.
					
					{exp:gdtstrings:replact needle="high-power" replacement="HIGH-POWER"}
					 We manufacture high-power lasers.
					{/exp:gdtstrings:replact}
					
					Parameters: 
					needle - string to replace  
					replacement - replacement string
					
					<?php
					 $buffer = ob_get_contents();
					 ob_end_clean();
					
					return $buffer;
					
			}
			
		
	}
/* End of file pi.gdtstrings.php */
/* Location: ./system/expressionengine/third_party/gdtstrings/pi.gdtstrings.php */
