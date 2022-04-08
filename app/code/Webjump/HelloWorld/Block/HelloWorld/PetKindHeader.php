<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Block\HelloWorld;

use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header;
use Webjump\HelloWorld\Api\PetKindRepositoryInterface;
use Webjump\HelloWorld\Model\Config\PetKind as PetKindConfig;


class PetKindHeader extends Header
{
    /**
     * @var HttpContext
     */
    private $httpContext;

    /**
     * @var PetKindRepositoryInterface
     */
    private $petKindRepository;

    /**
     * @var PetKindConfig
     */
    private $petKindConfig;

    /**
     * @param PetKindConfig $petKindConfig
     * @param HttpContext $httpContext
     * @param PetKindRepositoryInterface $petKindRepository
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        PetKindConfig $petKindConfig,
        HttpContext $httpContext,
        PetKindRepositoryInterface $petKindRepository,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->petKindConfig = $petKindConfig;
        $this->httpContext = $httpContext;
        $this->petKindRepository = $petKindRepository;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPetKindById(): string
    {
        if ($this->httpContext->getValue('is_logged_in')) {
            $petKindId = $this->httpContext
                ->getValue('customer_data')
                ->getCustomAttribute('customer_pet_kind')
                ->getValue();
            return $this->petKindRepository->getById((int) $petKindId)->getName();
        }

        return '';
    }

    /**
     * Checks it configuration is active
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->petKindConfig->isActive();
    }
}
