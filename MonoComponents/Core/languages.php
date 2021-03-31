<?php

class MONO_Languages {
    private $page;
    private $language;
    private $languagePackPath;
    private $config;
    private $defaultLanguage;

    private $ini;

    public function __construct($languagePackPath, $page) {
        $this->Start($languagePackPath, $page);
    }

    public function Start($languagePackPath, $page) {
        $this->AdvanceStart($languagePackPath, $page, MONO_AutorizationControl::GetUserLanguage());
    }

    public function AdvanceStart($languagePackPath, $page, $language) {$this->page = $page;
        $this->language = $language;
        $this->languagePackPath = $languagePackPath;
        
        $this->config = MONO_ini::Get(__DIR__ . "/Data/languages.ini");
        $this->defaultLanguage = MONO_isset($this->config["defaultLanguage"]);

        $this->ini = $this->getLanguageIni($this->language);
        $this->default_ini = $this->getLanguageIni($this->defaultLanguage);
    }

    public function translate($parametr) {
        $is_set = isset($this->ini[$parametr]);
        $is_set_default = isset($this->default_ini[$parametr]);

        if (!$is_set) {
            if (!$is_set_default) {
                return $parametr;
            }
            else {
                return $this->default_ini[$parametr];
            }
        }
        else {
            return $this->ini[$parametr];
        }
    }

    private function getLanguageIni($language) {
        return MONO_ini::Get($this->languagePackPath . $language . "/" . $this->page . ".ini");
    }
}