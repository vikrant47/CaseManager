<?php


namespace Demo\Workflow\Services;


use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Workflow\Models\ServiceChannel;
use Demo\Workflow\Models\Workflow;
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
        $this->logger->info('Evaluating channels to accept item' . ModelUtil::toString($model) . '. total = ' . $workflows->count());
        return InMemoryQueryFilter::findMatchingEntity(collect([$model]), $channels);
    }
}
