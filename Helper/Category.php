<?php

/**
 *

 */

namespace BuyRite\Faq\Helper;

/**
 * Category Helper
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
class Category extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \BuyRite\Faq\Model\ResourceModel\Faqcat
     */
    protected $_faqCatResourceModel;

    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \BuyRite\Faq\Model\ResourceModel\Faqcat $faqCatResourceModel
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \BuyRite\Faq\Model\ResourceModel\Faqcat $faqCatResourceModel,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->_faqCatResourceModel     = $faqCatResourceModel;
        $this->_storeManager    = $storeManager;
        parent::__construct($context);
    }

    /**
     * Get the list of categories
     *
     * @return array|null
     */
    public function getCategoriesList()
    {
        return $this->_faqCatResourceModel->getCategoriesList();
    }
}
