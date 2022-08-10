<?php

/**
 *

 */

namespace BuyRite\Faq\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'faq_id';

    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('BuyRite\Faq\Model\Faq', 'BuyRite\Faq\Model\ResourceModel\Faq');
    }
}
