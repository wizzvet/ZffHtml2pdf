<?php

namespace Zff\Html2Pdf\View\Renderer;

use Zend\View\Renderer\RendererInterface as Renderer;
use Zend\View\Resolver\ResolverInterface as Resolver;


/**
 *
 */
class Html2PdfRenderer implements Renderer {

    protected $viewRenderer;

    /**
     * Template resolver
     *
     * @var Resolver
     */
    private $__templateResolver;

    /**
     * @return Renderer
     */
    public function getViewRenderer() {
        return $this->viewRenderer;
    }

    public function setViewRenderer(Renderer $viewRenderer) {
        $this->viewRenderer = $viewRenderer;
        return $this;
    }

    public function render($nameOrModel, $values = null) {

        $html2pdf = new \HTML2PDF();
        $nameOrModel->setVariable('html2pdf', $html2pdf);

        $content = $this->getViewRenderer()->render($nameOrModel, $values);

        $html2pdf->WriteHTML($content);
        return $html2pdf->Output($nameOrModel->getFilename(), $nameOrModel->getDest());
    }

    /**
     * Return the template engine object
     *
     * Returns the object instance, as it is its own template engine
     *
     * @return Html2PdfRenderer
     */
    public function getEngine() {
        return $this;
    }

    /**
     * Set script resolver
     *
     * @param  Resolver $resolver
     * @return PhpRenderer
     * @throws Exception\InvalidArgumentException
     */
    public function setResolver(Resolver $resolver) {
        $this->__templateResolver = $resolver;
        return $this;
    }

}
