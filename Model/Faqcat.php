<?php

/**
 *

 */

namespace BuyRite\Faq\Model;

class Faqcat extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Cache tag
     *
     * @var string
     */
    const CACHE_TAG = 'buyrite_faq_category';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('BuyRite\Faq\Model\ResourceModel\Faqcat');
    }
}
