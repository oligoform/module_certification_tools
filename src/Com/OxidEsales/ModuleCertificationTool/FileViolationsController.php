<?php
/**
 *    This file is part of the OXID module certification tool
 *
 *    The OXID module certification tool is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The OXID module certification tool is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further details, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   OXID module certification tool
 * @copyright (C) OXID eSales AG 2003-2014
 */

namespace Com\OxidEsales\ModuleCertificationTool;

/**
 * Class CertificationRuleViolationsController controller class for handling XML output file of generic check modules
 */
class FileViolationsController
{

    public function __construct( array $aViolations )
    {
        $this->aViolations = $aViolations;
    }


    /**
     * Contains the Heading should be shown in output.
     *
     * @var string
     */
    protected $_sHeading = '';


    /**
     * Sets the heading that should be shown in output.
     *
     * @param string $sHeading the heading for this XML file.
     *
     * @return $this the controller ifself
     */
    public function setHeading( $sHeading )
    {
        $this->_sHeading = $sHeading;

        return $this;
    }

    /**
     * Returns the rendered HTML code with the information from the checker module.
     *
     * @return string the HTML output corresponding to the XML file output of the module
     */
    public function getHtml()
    {
        $oView = new View();
        $sHtml = "";
        if ( count( $this->aViolations ) > 0 ) {
            $sHtml = $oView->setTemplate( 'fileViolationTable' )
                ->assignVariable( 'aViolations', $this->aViolations )
                ->assignVariable( 'sHeading', $this->_sHeading )
                ->render();
        }

        return $sHtml;
    }

} 