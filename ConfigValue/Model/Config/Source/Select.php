<?php

namespace Dev\ConfigValue\Model\Config\Source;

class Select implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    [
        'value' => 1, 
        'label' => __('Male')
    ],
    [
        'value' => 2, 
        'label' => __('Female')
    ],
    [
        'value' => 3, 
        'label' => __('Others')
    ]
  ];
 }
}