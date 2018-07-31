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

use Exception;
use WIPCMS\core\interfaces\Storable;

class Language implements Storable {

    private const FALLBACK_LANGUAGE = 'en_US';

    private $_name;
    private $_strings;
    private $_loadedFiles;

    private $_directories;

    public function __construct(?string $name = null) {
        $this->_name = $name;

        $this->_strings = [];
        $this->_loadedFiles = [];

        // The script will look in these directories for the language file (useful for plugins).
        $this->_directories = [__DIR__ . '/../../languages'];
    }

    public function loadFile(string $filename) : void {
        if (!in_array($filename, $this->_loadedFiles)) {
            // Try loading the language file for the preferred language first. If it doesn't exist, try the fallback language.
            $file = $this->findLanguageFile($filename, $this->_name) ?? ($this->_name !== self::FALLBACK_LANGUAGE) ? $this->findLanguageFile($filename) : null;

            // We weren't able to load the language file. That's a shame.
            if (empty($file))
                throw new Exception(sprintf('Could not load language file named %s.language.php', $filename));

            $this->_strings[$filename] = require $file;
        }
    }

    public function findLanguageFile(string $filename, string $language = self::FALLBACK_LANGUAGE) : ?string {
        foreach ($this->_directories as $directory)
            if (file_exists($file = $directory . '/' . $language . '/' . $filename . '.language.php'))
                return $file;

        return null;
    }

    public function read(string $identifier, string ...$parameters) : string {
        $identifier = explode('.', $identifier);

        if (count($identifier) === 2) {
            if (!in_array($identifier[0], $this->_loadedFiles))
                $this->loadFile($identifier[0]);

            if (!empty($languageString = $this->_strings[$identifier[0]][$identifier[1]]))
                return count($parameters) > 0 ? sprintf($languageString, ...$parameters) : $languageString;
        }

        return sprintf('Could not find language string by identifier %s', $identifier);
    }
}