<?php

namespace Demo\Core\FormWidgets\DesignProviders;

use Event;
use File;
use Demo\Core\FormWidgets\RelatedList;
use RainLab\Builder\Classes\ControlDesignTimeProviderBase;
use RainLab\Builder\Classes\ControlLibrary;
use RainLab\Builder\Widgets\DefaultControlDesignTimeProvider;

class DefaultDesignProvider extends ControlDesignTimeProviderBase
{
    public function renderControlBody($type, $properties, $formBuilder)
    {
        return $this->makePartial('control-' . $type, [
            'properties' => $properties,
            'formBuilder' => $formBuilder
        ]);
    }

    public function renderControlStaticBody($type, $properties, $controlConfiguration, $formBuilder)
    {
        $partialName = 'control-static-' . $type;
        $partialPath = $this->getViewPath('_' . $partialName . '.htm');
        if (!File::exists($partialPath)) {
            return null;
        }
        return $this->makePartial($partialName, [
            'properties' => $properties,
            'controlConfiguration' => $controlConfiguration,
            'formBuilder' => $formBuilder
        ]);
    }

    public function controlHasLabels($type)
    {
        return true;
    }

    public static function listenWidgetEvents()
    {
        Event::listen('pages.builder.registerControls', function ($controlLibrary) {
            $controlLibrary->registerControl(
                'relatedlist',
                'Related List',
                'Add Related Records as List',
                ControlLibrary::GROUP_WIDGETS,
                'icon-file-image-o',
                $controlLibrary->getStandardProperties([], RelatedList::getProperties()),
                DefaultDesignProvider::class
            );
        });

    }
}