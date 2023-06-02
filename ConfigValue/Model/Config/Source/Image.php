<?php
namespace Dev\ConfigValue\Model\Config\Source;

class Image extends \Magento\Config\Model\Config\Backend\Image
{
    const UPLOAD_DIR = 'magepow/backendimage';
    protected $_maxFileSize = 20480;
    
    protected function _getUploadDir()
    {
        return $this->_mediaDirectory->getAbsolutePath($this->_appendScopeInfo(self::UPLOAD_DIR));
    }

    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    protected function getAllowedExtensions()
    {
        return ['jpg', 'jpeg', 'gif', 'png', 'svg'];
    }

    protected function getTmpFileName()
    {
        $tmpName = null;
        if (isset($_FILES['groups'])) {
            $tmpName = $_FILES['groups']['tmp_name'][$this->getGroupId()]['fields'][$this->getField()]['value'];
        } else {
            $tmpName = is_array($this->getValue()) ? $this->getValue()['tmp_name'] : null;
        }
        return $tmpName;
    }

    public function beforeSave()
    {
        $value = $this->getValue();
        $deleteFlag = is_array($value) && !empty($value['delete']);
        $fileTmpName = $this->getTmpFileName();

        if ($this->getOldValue() && ($fileTmpName || $deleteFlag)) {
            $this->_mediaDirectory->delete(self::UPLOAD_DIR . '/' . $this->getOldValue());
        }
        return parent::beforeSave();
    }
}