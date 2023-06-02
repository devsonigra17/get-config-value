<?php

namespace Dev\ConfigValue\Model\Config\Source;

class MultiSelect implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    [
        'value' => 'Cricket', 
        'label' => __('Cricket')
    ],
    [
        'value' => 'Chess', 
        'label' => __('Chess')
    ],
    [
        'value' => 'Football', 
        'label' => __('Football')
    ]
  ];
 }
}