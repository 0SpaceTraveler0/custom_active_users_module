<?php

class custom_activeusers  extends CModule
{
    var $MODULE_ID = "custom.activeusers";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function __construct()
    {
        $arModuleVersion = array();
        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path . "/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = "Активные пользователи список – модуль с компонентом";
        $this->MODULE_DESCRIPTION = "После установки вы сможете пользоваться компонентом custom:user.active.list";
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/local/modules/custom.activeusers/install/components",
            $_SERVER["DOCUMENT_ROOT"] . "/bitrix/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/bitrix/components/custom");
        return true;
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->InstallFiles();
        RegisterModule("custom.activeusers");
        $APPLICATION->IncludeAdminFile("Установка модуля custom.activeusers", $DOCUMENT_ROOT . "/local/modules/custom.activeusers/install/step.php");
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallFiles();
        UnRegisterModule("custom.activeusers");
        $APPLICATION->IncludeAdminFile("Деинсталляция модуля custom.activeusers", $DOCUMENT_ROOT . "/local/modules/custom.activeusers/install/unstep.php");
    }
}
