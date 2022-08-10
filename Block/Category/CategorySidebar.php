<?php

/**
 *
 * @Author              Ngo Quang Cuong <bestearnmoney87@gmail.com>
 * @Date                2016-12-20 23:46:21
 * @Last modified by:   nquangcuong
 * @Last Modified time: 2017-01-06 07:59:25
 */

namespace BuyRite\Faq\Block\Category;

use Magento\Framework\View\Element\Template\Context;
use BuyRite\Faq\Helper\Category as CategoryHelper;
use BuyRite\Faq\Model\ResourceModel\Faq;
use BuyRite\Faq\Helper\Config as ConfigHelper;

class CategorySidebar extends \Magento\Framework\View\Element\Template
{
    /**
     *
     * @var \BuyRite\Faq\Helper\Category
     */
    protected $_categoryHelper;

    /**
     * @var array
     */
    protected $_faqCategoriesList;

    /**
     * @var \BuyRite\Faq\Helper\Config
     */
    protected $_configHelper;

    /**
     * @param Context $context
     * @param CategoryHelper $categoryHelper
     * @param ConfigHelper $configHelper
     */
    public function __construct(
        Context $context,
        CategoryHelper $categoryHelper,
        ConfigHelper $configHelper
    ) {
        $this->_categoryHelper = $categoryHelper;
        $this->_configHelper = $configHelper;
        parent::__construct($context);
    }

    /**
     *
     * @return parent
     */
    protected function _prepareLayout()
    {
        $this->_faqCategoriesList = $this->_categoryHelper->getCategoriesList();
        return parent::_prepareLayout();
    }

    /**
     * Get List of Categories
     *
     * @return array|null
     */
    public function getFaqCategoriesList()
    {
        return $this->_faqCategoriesList;
    }

    /**
     * Get URL of the category
     *
     * @param $identifier
     * @return array|null
     */
    public function getFaqCategoryFullPath($identifier)
    {
        return $this->_configHelper->getFaqCategoryFullPath($identifier);
    }
}
