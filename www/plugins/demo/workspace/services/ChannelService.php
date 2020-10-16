<?php


namespace Demo\Workspace\Services;


use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Workspace\Models\ServiceChannel;
use Demo\Workspace\Models\Workflow;
use Illuminate\Support\Collection;
use Monolog\Logger;

class ChannelService
{
    /**@var $logger Logger */
    protected $logegr;

    public function __construct()
    {
        $this->logger = PluginConnection::getCurrentLogger();
    }

    /**
     * This will search for a channel by given model
     * @return ServiceChannel matched channel
     */
    public function searchChannel($model)
    {
        $modelClass = get_class($model);
        /**@var $channels Collection<ServiceChannel> */
        $channels = ServiceChannel::where('active', 1)->where('model', '=', $modelClass)->orderBy('sort_order', 'ASC')->get();
        $this->logger->info('Evaluating channels to accept item' . ModelUtil::toString($model) . '. total = ' . $channels->count());
        return InMemoryQueryFilter::findMatchingEntity(collect([$model]), $channels);
    }
}
