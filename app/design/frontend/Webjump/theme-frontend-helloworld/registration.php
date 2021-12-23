<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::THEME,
    'frontend/Webjump/theme-frontend-helloworld',
    __DIR__
);
