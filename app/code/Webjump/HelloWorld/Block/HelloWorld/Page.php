<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Block\HelloWorld;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Page extends Template
{
    /**
     * Create constructor.
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getDeveloperData(): array
    {
        return [
            'Developer Name' => 'Danilo Eidy Ramazzotti Suguimoto',
            'Occupation' => 'Backend Developer',
            'Age' => 20
        ];
    }
}
