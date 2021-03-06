<?php

namespace Statamic\Addons\RedirectToChild;

use Statamic\API\Config;
use Statamic\API\Content;
use Statamic\API\URL;
use Statamic\Exceptions\RedirectException;
use Statamic\Extend\Tags;

class RedirectToChildTags extends Tags
{
    /**
     * The {{ redirect_to_child }} tag
     *
     * @return string|array
     */
    public function index()
    {

        // Settings and parameters
        $site_root       = SITE_ROOT;
        $current_url     = URL::getCurrent();
        $response        = $this->get('response', 302);
        $from            = $current_url;
        $max_depth       = '1';
        $folders_only    = true;
        $include_entries = false;
        $exclude         = '';
        $tree            = Content::tree($from, $max_depth, null, null, $exclude, Config::getShortLocale());
        $url             = !empty($tree) ? $tree[0]['page']->absoluteUrl() : '';
        $e               = new RedirectException;

        if (!empty($url)){
            $e->setUrl($url);
            $e->setStatusCode($this->get('response', 302));

            throw $e;
        } else {
            return false;
        }
    }
}
