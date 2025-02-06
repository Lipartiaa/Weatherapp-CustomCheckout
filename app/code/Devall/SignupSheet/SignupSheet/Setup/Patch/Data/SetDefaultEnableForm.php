<?php
namespace Devall\SignupSheet\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class SetDefaultEnableForm implements DataPatchInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * SetDefaultEnableForm constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Apply the patch.
     *
     * @return void
     */
    public function apply()
    {
        $this->scopeConfig->setValue(
            'devall_signup_sheet/general/enable_form',
            1,  // Default to 'Yes'
            \Magento\Store\Model\ScopeInterface::SCOPE_DEFAULT
        );
    }

    /**
     * Get the patch identifiers.
     *
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get the patch version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }
}
