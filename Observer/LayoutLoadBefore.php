<?php
/**
 * Sander_DisableCompareProducts
 */
declare(strict_types=1);

namespace Sander\DisableCompareProducts\Observer;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * When "Disable Compare Products" is enabled, add a layout handle that removes every
 * compare block from the page.
 */
class LayoutLoadBefore implements ObserverInterface
{
    public const DISABLE_COMPARE_CONFIG_PATH = 'catalog/recently_products/disable_compare';
    public const LAYOUT_HANDLE = 'sander_disablecompareproducts_remove_compare';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    public function execute(Observer $observer): void
    {
        if (!$this->scopeConfig->isSetFlag(self::DISABLE_COMPARE_CONFIG_PATH, ScopeInterface::SCOPE_STORE)) {
            return;
        }

        $layout = $observer->getData('layout');
        if ($layout !== null) {
            $layout->getUpdate()->addHandle(self::LAYOUT_HANDLE);
        }
    }
}
