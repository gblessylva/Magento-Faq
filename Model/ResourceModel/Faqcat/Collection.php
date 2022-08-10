<?php

/**
 *

 */

namespace BuyRite\Faq\Model\ResourceModel\Faqcat;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'category_id';

    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('BuyRite\Faq\Model\Faqcat', 'BuyRite\Faq\Model\ResourceModel\Faqcat');
    }
}
