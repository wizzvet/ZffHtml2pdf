<?php

namespace Zff\Html2Pdf\Mvc\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zff\Html2Pdf\View\Strategy\Html2PdfStrategy;
use Zff\Html2Pdf\View\Renderer\Html2PdfRenderer;

/**
 * 
 */
class ViewHtml2PdfStrategyFactory implements FactoryInterface {

    /**
     * Create and return the Html2Pdf view strategy
     *
     * Retrieves the ViewHtml2PdfRenderer service from the service locator, and
     * injects it into the constructor for the Html2Pdf strategy.
     *
     * It then attaches the strategy to the View service, at a priority of 100.
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return JsonStrategy
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $html2pdfRenderer = new Html2PdfRenderer();
        $html2pdfRenderer->setViewRenderer($serviceLocator->get('ViewManager')->getRenderer());
        $html2pdfStrategy = new Html2PdfStrategy($html2pdfRenderer);
        return $html2pdfStrategy;
    }

}
