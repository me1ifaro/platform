<?php

namespace Oro\Bundle\DataGridBundle\Tests\Unit\DataFixtures\Stub\Extension;

use Oro\Bundle\DataGridBundle\Extension\AbstractExtension;
use Oro\Bundle\DataGridBundle\Datagrid\Common\DatagridConfiguration;

class SomeExtension extends AbstractExtension
{
    /**
     * Checks if extensions should be applied to grid
     *
     * @param DatagridConfiguration $config
     *
     * @return bool
     */
    public function isApplicable(DatagridConfiguration $config)
    {
        return true;
    }
}
