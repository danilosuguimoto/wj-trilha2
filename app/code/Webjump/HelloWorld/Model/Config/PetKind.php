<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Config for Pet Kind
 */
class PetKind
{
    const XML_PATH_ACTIVE = 'petkind/view/enabled';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @codeCoverageIgnore
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Verifies whether the configuration is active
     *
     * @param string $scopeType
     * @param $scopeCode
     * @return bool
     */
    public function isActive(string $scopeType = ScopeInterface::SCOPE_WEBSITE, $scopeCode = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, $scopeType, $scopeCode);
    }
}
