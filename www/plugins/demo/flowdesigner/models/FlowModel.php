<?php


namespace Demo\FlowDesigner\Models;


use Illuminate\Support\Collection;
use October\Rain\Database\Model;

/**
 * @property string $name Name of node
 * @property string $description Description of node
 * @property array $definition JSON definition of the Flow
 * @property Collection<NodeModel> $nodes Collection of nodes on flow
 */
abstract class FlowModel extends Model
{

}
