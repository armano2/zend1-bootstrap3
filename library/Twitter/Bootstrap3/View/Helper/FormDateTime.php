<?php
/**
 * Twitter Bootstrap v.3 Form for Zend Framework v.1
 * 
 * @category Forms
 * @package Twitter_Bootstrap3_View
 * @subpackage Helper
 * @author Ilya Serdyuk <ilya.serdyuk@youini.org>
 */

/**
 * Helper to generate a "datetime" element
 * 
 * @category Forms
 * @package Twitter_Bootstrap3_View
 * @subpackage Helper
 */
class Twitter_Bootstrap3_View_Helper_FormDateTime extends Twitter_Bootstrap3_View_Helper_FormText
{
    /**
     * Generates a 'datetime' element.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are used in place of added parameters.
     *
     * @param mixed $value The element value.
     *
     * @param array $attribs Attributes for the element tag.
     *
     * @return string The element XHTML.
     */
    public function formDateTime($name, $value = null, $attribs = null)
    {
        $js = sprintf('$("#%s").datetimepicker(%s);', $attribs['id'], Zend_Json::encode([
            'locale' => 'pl',
            'format' => array_key_exists('format', $attribs) ? $attribs['format'] : 'YYYY-MM-DD HH:mm:ss'
        ]));

        if ($this->view instanceof Zend_View) {
            $this->view->headLink()->appendStylesheet('/public/assets/datetimepicker/css/bootstrap-datetimepicker.min.css');
            $this->view->headScript()->appendFile('/public/assets/moment/moment-with-locales.min.js');
            $this->view->headScript()->appendFile('/public/assets/datetimepicker/js/bootstrap-datetimepicker.min.js');
        }

        return $this->_formText('text', $name, $value, $attribs) . '<script type="text/javascript">$(function() {' . $js . '})</script>';
    }
}
