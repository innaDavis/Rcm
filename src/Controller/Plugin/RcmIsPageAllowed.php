<?php

namespace Rcm\Controller\Plugin;

use Rcm\Acl\CmsPermissionChecks;
use Rcm\Entity\Page;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Redirect To Page Controller Plugin
 *
 * Redirect To Page Controller Plugin.  This plugin is used to redirect a user
 * to a CMS page by sending the URL to the page and the page type of that page.
 *
 * @category  Reliv
 * @package   Rcm
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://github.com/reliv
 */
class RcmIsPageAllowed extends AbstractPlugin
{
    /** @var \Rcm\Acl\CmsPermissionChecks  */
    public $checker;

    public function __construct(CmsPermissionChecks $cmsPermissionChecks)
    {
        $this->checker = $cmsPermissionChecks;
    }

    /**
     * isAdmin
     *
     * @param Page $page Page to check
     *
     * @return \Zend\Http\Response
     */
    public function __invoke(Page $page)
    {
        return $this->checker->isPageAllowedForReading($page);
    }
}
