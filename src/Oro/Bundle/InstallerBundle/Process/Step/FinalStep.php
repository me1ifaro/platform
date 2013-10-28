<?php

namespace Oro\Bundle\InstallerBundle\Process\Step;

use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;

use Oro\Bundle\InstallerBundle\InstallerEvents;

class FinalStep extends AbstractStep
{
    public function displayAction(ProcessContextInterface $context)
    {
        if ($this->container->hasParameter('installed') && $this->container->getParameter('installed')) {
            return $this->redirect($this->generateUrl('oro_default'));
        }

        set_time_limit(120);

        $params = $this->get('oro_installer.yaml_persister')->parse();

        // everything was fine - set %installed% flag to current date
        $params['system']['installed'] = date('c');

        $this->get('oro_installer.yaml_persister')->dump($params);
        $this->get('event_dispatcher')->dispatch(InstallerEvents::FINISH);

        $this->complete();

        return $this->render('OroInstallerBundle:Process/Step:final.html.twig');
    }
}