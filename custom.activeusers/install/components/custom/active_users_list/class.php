<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;
use Bitrix\Main\UserTable;

Class UserActiveList extends \CBitrixComponent {
    public function executeComponent() {

        if(!Loader::includeModule('main')) return;

        $result = UserTable::getList([
           'select' => ['LAST_NAME', 'NAME', 'LOGIN', 'EMAIL', 'DATE_REGISTER'],
            'filter' => ['ACTIVE' => 'Y'],
        ]);

        $this->arResult = $result->fetchAll();
        $this->IncludeComponentTemplate();
    }
}