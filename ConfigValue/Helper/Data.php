<?php

namespace Dev\ConfigValue\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const CONFIG_DATA = 'config_value/general';
    
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
           \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->_storeManager = $storeManager;
    }
    
    public function getBaseUrlMedia()
    {
       return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
    public function getConfig()
    {
        $configValue = $this->scopeConfig->getValue(self::CONFIG_DATA,ScopeInterface::SCOPE_STORE);
        return $configValue;
    }
}