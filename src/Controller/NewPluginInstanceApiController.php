<?php

namespace Rcm\Controller;

use Rcm\Http\Response;
use Zend\View\Helper\HeadLink;
use Zend\View\Helper\HeadScript;

/**
 * PluginRenderApiController
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   Rcm\Controller
 * @author    Rod Mcnew <rmcnew@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class NewPluginInstanceApiController extends AbstractActionController
{
    /**
     * getNewInstanceAction
     *
     * @return Response
     */
    public function getNewInstanceAction()
    {
        $routeMatch = $this->getEvent()->getRouteMatch();
        $pluginType = $routeMatch->getParam('pluginType');
        $instanceId = $routeMatch->getParam('instanceId');
        $pluginManager = $this->getServiceLocator()
            ->get('Rcm\Service\PluginManager');
        if ($instanceId < 0) {
            $instanceConfig = $pluginManager
                ->getDefaultInstanceConfig($pluginType);
        } else {
            $instanceConfig = $pluginManager->getInstanceConfig($instanceId);
        }

        //Allow plugins to preview with an unsaved instance configuration
        $instanceConfigPreview = $this->params()
            ->fromPost('previewInstanceConfig');
        if ($instanceConfigPreview) {
            $instanceConfig = array_merge(
                $instanceConfig,
                $instanceConfigPreview
            );
        }

        $viewData = $pluginManager->getPluginViewData(
            $pluginType,
            $instanceId,
            $instanceConfig
        );
        $html = $viewData['html'];
        $headLink = new HeadLink();
        foreach ($viewData['css'] as $css) {
            $cssInfo = unserialize($css);
            $headLink->append($cssInfo);
        }
        $headScript = new HeadScript();
        foreach ($viewData['js'] as $js) {
            $jsInfo = unserialize($js);
            $headScript->append($jsInfo);
        }
        $html = $headLink->toString() . $headScript->toString() . $html;
        $response = new Response();
        $response->setContent($html);
        return $response;
    }
}
