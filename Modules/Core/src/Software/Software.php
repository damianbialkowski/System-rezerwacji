<?php

namespace Modules\Core\src\Software;

class Software implements ISoftware
{
    public function all(): array
    {
        return [
            'php_version' => $this->getPhpVersion(),
            'required_php_version' => $this->getRequiredPhpVersion(),
            'passed_version' => $this->checkPhpVersion()
        ];
    }

    public function getPhpVersion(): string
    {
        return phpversion();
    }

    public function getRequiredPhpVersion(): string
    {
        return config('core.phpVersion');
    }

    public function checkPhpVersion(): bool
    {
        $phpVersion = $this->getPhpVersion();
        $requiredPhpVersion = $this->getRequiredPhpVersion();
        return version_compare($phpVersion, $requiredPhpVersion, '>=');
    }

    public function getPhpExtensions(): array
    {
        return get_loaded_extensions();
    }

    public function getApacheModules(): array
    {
        return apache_get_modules();
    }

    public function isPhpExtensionLoaded($extension): bool
    {
        return extension_loaded($extension);
    }

    public function isApacheModuleEnabled($extension): bool
    {
        return in_array($extension, $this->getApacheModules());
    }
}
