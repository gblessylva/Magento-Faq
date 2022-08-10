<?php

/**
 *
 
 */

namespace BuyRite\Faq\Model\Config\Source\Admin;

class User implements \Magento\Framework\Option\ArrayInterface
{
    /**
     *
     * @var \Magento\User\Model\UserFactory
     */
    protected $userFactory;

    /**
     *
     * @param \Magento\User\Model\UserFactory $userFactory
     */
    public function __construct(
        \Magento\User\Model\UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $admin_user = $this->userFactory->create()->getCollection()->load()->getData();
        foreach ($admin_user as $value) {
            $results[] = [
                'value' => $value['user_id'],
                'label' => trim($value['firstname'].' '.$value['lastname'])
            ];
        }
        return $results;
    }
}
