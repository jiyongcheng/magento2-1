<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Shopping cart downloadable item render block
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Downloadable\Block\Checkout\Cart\Item;

use Magento\Framework\Pricing\PriceCurrencyInterface;

class Renderer extends \Magento\Checkout\Block\Cart\Item\Renderer
{
    /**
     * Downloadable catalog product configuration
     *
     * @var \Magento\Downloadable\Helper\Catalog\Product\Configuration
     */
    protected $_downloadableProductConfiguration = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Helper\Product\Configuration $productConfig
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Catalog\Helper\Image $imageHelper
     * @param \Magento\Framework\Url\Helper\Data $urlHelper
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param PriceCurrencyInterface $priceCurrency
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param \Magento\Downloadable\Helper\Catalog\Product\Configuration $downloadableProductConfiguration
     * @param array $data
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Helper\Product\Configuration $productConfig,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Downloadable\Helper\Catalog\Product\Configuration $downloadableProductConfiguration,
        array $data = []
    ) {
        $this->_downloadableProductConfiguration = $downloadableProductConfiguration;
        parent::__construct(
            $context,
            $productConfig,
            $checkoutSession,
            $imageHelper,
            $urlHelper,
            $messageManager,
            $priceCurrency,
            $moduleManager,
            $data
        );
    }

    /**
     * Retrieves item links options
     *
     * @return array
     */
    public function getLinks()
    {
        if (!$this->getItem()) {
            return [];
        }
        return $this->_downloadableProductConfiguration->getLinks($this->getItem());
    }

    /**
     * Return title of links section
     *
     * @return string
     */
    public function getLinksTitle()
    {
        return $this->_downloadableProductConfiguration->getLinksTitle($this->getProduct());
    }

    /**
     * Get list of all options for product
     *
     * @return array
     */
    public function getOptionList()
    {
        return $this->_downloadableProductConfiguration->getOptions($this->getItem());
    }

    /**
     * Get list of all options for product
     * @param \Magento\Catalog\Model\Product\Configuration\Item\ItemInterface $item
     * @return array
     */
    public function getOption($item)
    {
        return $this->_downloadableProductConfiguration->getOptions($item);
    }
}
