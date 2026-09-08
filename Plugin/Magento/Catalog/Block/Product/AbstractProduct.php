<?php
/**
 * Sander_DisableCompareProducts
 */
declare(strict_types=1);

namespace Sander\DisableCompareProducts\Plugin\Magento\Catalog\Block\Product;

use Magento\Catalog\Block\Product\AbstractProduct as Subject;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Sander\DisableCompareProducts\Observer\LayoutLoadBefore;

/**
 * Return null for the "add to compare" URL when comparison is disabled, so the many
 * templates that only show the compare link when this URL is set stop rendering it.
 */
class AbstractProduct
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * @param Subject $subject
     * @param mixed $result
     * @return mixed
     */
    public function afterGetAddToCompareUrl(Subject $subject, mixed $result): mixed
    {
        if ($this->scopeConfig->isSetFlag(LayoutLoadBefore::DISABLE_COMPARE_CONFIG_PATH, ScopeInterface::SCOPE_STORE)) {
            return null;
        }

        return $result;
    }
}
