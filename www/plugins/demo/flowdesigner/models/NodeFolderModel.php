<?php


namespace Demo\FlowDesigner\Models;


use October\Rain\Database\Model;

/**
 * @property string $name Name of node
 * @property string $description Description of node
 * @property string $icon Icon of node
 * @property string $folder Parent Folder of node
 * @property int $sort_order Order of node in folder
 */
abstract class NodeFolderModel extends Model
{

}
