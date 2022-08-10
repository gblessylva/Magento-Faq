<?php

/**
 *

 */

namespace BuyRite\Faq\Model\Config\Source;

class Category implements \Magento\Framework\Option\ArrayInterface
{
    /**
     *
     * @var \BuyRite\Faq\Model\Faqcat
     */
    protected $_faqCategory;

    /**
     *
     * @param \BuyRite\Faq\Model\Faqcat $faqCat
     */
    public function __construct(
        \BuyRite\Faq\Model\Faqcat $faqCat
    ) {
        $this->_faqCategory = $faqCat;
    }

    /**
     * Get the list of active categories
     *
     * @return array|null;
     */
    protected function getCategoriesActive()
    {
        return $this->_faqCategory->getCollection()
        ->addFieldToFilter('is_active', '1')
        ->load()
        ->getData();
    }

    /**
     * Get the list of categories
     *
     * @return array|null;
     */
    protected function getAllCategories()
    {
        return $this->_faqCategory->getCollection()->load()->getData();
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $model = $this->getAllCategories();
        $results = [];
        $results[] = [
            'value' => '0',
            'label' => 'All Categories'
        ];
        foreach ($model as $value) {
            $results[] = [
                'value' => $value['category_id'],
                'label' => $value['title']
            ];
        }
        return $results;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function getCategoryOptions()
    {
        $model = $this->getCategoriesActive();

        $options = [
            '' => '-- Select a category --'
        ];

        foreach ($model as $value) {
            $arg = [
                $value['category_id'] => $value['title']
            ];
            $options = $options + $arg;
        }

        $this->_options = $options;
        return $this->_options;
    }
}
