<?php
/**
 * Copyright © 2017 Rejoiner. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Rejoiner\Acr\Block\Adminhtml\Form\Field;

class Salesrule extends \Magento\Framework\View\Element\Html\Select
{
    /**
     * @var \Magento\SalesRule\Model\RuleFactory $ruleFactory
     */
    private $_salesruleFactory;

    /**
     * @param \Magento\SalesRule\Model\RuleFactory $ruleFactory
     * @param \Magento\Framework\View\Element\Context $context
     * @param array $data
     */
    public function __construct(
        \Rejoiner\Acr\Model\System\Config\Source\Salesrule $salesruleFactory,
        \Magento\Framework\View\Element\Context $context,
        array $data = []
    ) {
        $this->_salesruleFactory = $salesruleFactory;
        parent::__construct($context, $data);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $salesRuleOptions = $this->_salesruleFactory->toOptionArray();
            foreach ($salesRuleOptions as $option) {
                $this->addOption($option['value'], addslashes($option['label']));
            }
        }

        return parent::_toHtml();
    }

    /**
     * Sets name for input element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}