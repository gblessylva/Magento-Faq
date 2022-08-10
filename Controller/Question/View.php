<?php

/**

 */

namespace BuyRite\Faq\Controller\Question;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $_resultForwardFactory;

    /**
     * @var \BuyRite\Faq\Model\ResourceModel\Faq
     */
    protected $_faqResourceModel;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \BuyRite\Faq\Model\ResourceModel\Faq $faqResourceModel,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->_faqResourceModel     = $faqResourceModel;
        $this->_resultForwardFactory = $resultForwardFactory;
        $this->_resultPageFactory    = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * View action
     *
     * @return \Magento\Framework\View\Result\PageFactory|\Magento\Framework\Controller\Result\ForwardFactory
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('faq_id');
        $model = $this->_objectManager->create('BuyRite\Faq\Model\Faq');
        if ($id && (int) $id > 0 && $this->_faqResourceModel->getFaqStore($id)) {
            $faq = $model->load($id);
            $this->_faqResourceModel->getConnection()->update($this->_faqResourceModel->getTable('buyrite_faq'), ['viewed' => $faq->getViewed()+1], ['faq_id = ?' => (int) $id]);
            return $this->_resultPageFactory->create();
        }
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('noroute');
    }
}
