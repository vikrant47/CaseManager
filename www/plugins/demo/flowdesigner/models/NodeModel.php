<?php


namespace Demo\FlowDesigner\Models;


use October\Rain\Database\Model;

/**
 * @property string $name Name of node
 * @property string $code Code of node
 * @property string $description Description of node
 * @property string $script Script of node
 * @property string $icon Icon of node
 * @property string $shape (mxRectangle etc.)Shape of node
 * @property string $folder Folder of node
 * @property int $sort_order Order of node in folder
 * @property FlowModel $flow Flow of the node - memory
 * @property NodeModel $parent Parent of the node - memory
 */
abstract class NodeModel extends Model
{

}
