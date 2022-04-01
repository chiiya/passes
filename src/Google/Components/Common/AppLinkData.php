<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class AppLinkData extends Component
{
    /**
     * Optional.
     * Optional information about the partner app link. If included, the app link link module will be rendered on
     * the valuable details on the android client.
     */
    public ?AppLinkInfo $androidAppLinkInfo;

    /**
     * Optional.
     * Optional information about the partner app link. If included, the app link link module will be rendered on
     * the valuable details on the ios client.
     */
    public ?AppLinkInfo $iosAppLinkInfo;

    /**
     * Optional.
     * Optional information about the partner app link. If included, the app link link module will be rendered on
     * the valuable details on the web client.
     */
    public ?AppLinkInfo $webAppLinkInfo;
}
