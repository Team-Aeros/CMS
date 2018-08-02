<?php
/**
 * WIP CMS
 * Open source content management system
 *
 * @version 1.0 Alpha 1
 * @author Aeros Development
 * @copyright 2018, WIP CMS
 * @link https://aeros.com/wipcms
 *
 * @license MIT
 */

namespace WIPCMS\core\common;

use Twig_Environment;
use Twig_Error_Loader;
use Twig_Error_Runtime;
use Twig_Error_Syntax;
use Twig_Function;
use Twig_Loader_Filesystem;
use WIPCMS\core\interfaces\Storable;

use function WIPCMS\core\translate;

class GUI implements Storable {

    private $_twig;
    private $_defaultParams;
    private $_templatePaths;

    public function __construct(?string $theme = null) {
        $theme = $theme ?? CONFIG['site']['default_theme'];

        $this->createDefaultParams();

        $this->_templatePaths = [
            CONFIG['paths']['themes'] . '/' . $theme . '/templates'
        ];

        $this->_twig = new Twig_Environment(new Twig_Loader_Filesystem($this->_templatePaths));

        $this->_twig->addFunction(new Twig_Function('translate', function(string $identifier, string ...$params) : string {
            return translate($identifier, ...$params);
        }));
    }

    public function returnView(string $view, ?array $params = []) : string {
        try {
            return $this->_twig->render($view . '.html.twig', array_merge($this->_defaultParams, $params));
        } 
        catch (Twig_Error_Loader | Twig_Error_Runtime | Twig_Error_Syntax $e) {
            printf('Unable to load template %s', (DEBUG ? ': ' . $e : ''));
        }

        return '';
    }

    private function createDefaultParams() : void {
        $this->_defaultParams = [
            'site_url' => CONFIG['urls']['root']
        ];   
    }

    public function addDefaultParams(array $params) : void {
        $this->_defaultParams = array_merge($this->_defaultParams, $params);
    }
}