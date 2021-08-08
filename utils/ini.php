<?php

class MONO_ini {
    private $filePath = "";
    private $ini;
    private $multi = false;

    public function __construct($file, $rewrite = false)
    {
        $this->filePath = $file;

        if ($rewrite) $this->ini = array();
        else $this->ini = parse_ini_file($file, true);

        $this->ConvertBool();

        $this->multi = $this->IsMultiArr($this->ini);
    }

    private function ConvertBool() {
        if ($this->multi) {
            foreach ($this->ini as $group => $arr) {
                foreach ($this->ini as $key => $value) {
                    if ($value == "1") $this->ini[$key] = true;
                    if ($value == "0") $this->ini[$key] = false;
                }
            }
        }
        else {
            foreach ($this->ini as $key => $value) {
                if ($value == "1") $this->ini[$key] = true;
                if ($value == "0") $this->ini[$key] = false;
            }
        }
    }

    public function Get() {
        return $this->ini;
    }
    public function IsMulti() {
        return $this->multi;
    }
    private function IsMultiArr($arr) {
        $multi = false;
        foreach ($arr as $value) {
            if (is_array($value)) $multi = true;
            break;
        }
        return $multi;
    }

    public function Write($arr) {
        $multi = $this->IsMultiArr($arr);

        if (($this->multi && $multi) || (!$this->multi && !$multi)) {
            foreach ($arr as $name => $value) {
                $this->ini[$name] = $value;
            }
        }
        else {
            return "Array parametr error.";
        }
    }

    public function Close() {
        $write_data = "";
        if ($this->multi) {
            foreach ($this->ini as $group => $arr) {
                $write_data .= "[" . $group . "]\n";
                foreach ($arr as $key => $value) {
                    if (gettype($value) == "boolean") {
                        if ($value == true) $write_data .= $key . " = true;\n";
                        else $write_data .= $key . " = false;\n";
                    }
                    else $write_data .= $key . " = '" . $value . "';\n";
                }
                $write_data .= "\n";
            }
        }
        else {
            foreach ($this->ini as $key => $value) {
                if (gettype($value) == "boolean") {
                    if ($value == true) $write_data .= $key . " = true;\n";
                    else $write_data .= $key . " = false;\n";
                }
                else $write_data .= $key . " = '" . $value . "';\n";
            }
        }
        file_put_contents($this->filePath, $write_data);
    }
}