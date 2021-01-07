<?php

namespace Drupal\custom_site_information\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class SiteApiKeyController extends ControllerBase{
    /**
     * @param $siteapikey - Site API key parameter passed in URL
     * @param NodeInterface $node - the node built from the node id parameter passed in URL
     * @return JsonResponse
     */
    public function content($siteapikey, NodeInterface $node){
        // Fetch Site API Key configuration value
        $siteapikey_saved = \Drupal::config('system.site')->get('siteapikey');

        // Make sure the supplied node is a page content type and the site API key is set and matches the supplied API Key in url
        if($node->getType() == 'page' && $siteapikey_saved == $siteapikey){

            // Respond with the json data of the node
            return new JsonResponse($node->toArray(), 200, ['Content-Type'=> 'application/json']);
        }

        // Respond with access denied
        return new JsonResponse(array("error" => "access denied"), 401, ['Content-Type'=> 'application/json']);
    }
}