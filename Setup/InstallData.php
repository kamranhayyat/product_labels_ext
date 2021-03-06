<?php

namespace Kamran\CustomExt\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
          "product_label_attribute",
          [
          'group' => "Product Labels",
          'label' => "Product Label Attribute",
          'is_html_allowed_on_front' => true,
          'default' => '1',
          'note' => '',
          'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
          'visible' => true,
          'required' => false,
          'user_defined' => false,
          'searchable' => false,
          'filterable' => false,
          'comparable' => false,
          'visible_on_front' => true,
          'visible_in_advanced_search' => false,
          'unique' => false,
          "frontend_class" => "",
          "used_in_product_listing" => true,
          "input" => "select",
          "type" => "varchar",
          "source" => "Kamran\CustomExt\Model\Source\ProductLabelSource",
          'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
          ]
      );
    }
}