<?php namespace Demo\Core\Classes\Ifs;


interface Seedable
{
    /**This will be executed to install seeds*/
    public function install();

    /**This will be executed to uninstall seeds*/
    public function uninstall();
}