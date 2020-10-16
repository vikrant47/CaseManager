<?php namespace Demo\Workspace\Models;

use Backend\Models\User;
use Demo\Core\Models\ModelModel;
use Illuminate\Validation\ValidationException;
use Model;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\Facades\Flash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Model
 */
class WorkProfile extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workspace_work_profiles';
    public $incrementing = false;
    public $attachAuditedBy = true;
    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'channel_profiles' => 'required',
    ];
    public $channelProfileRules = [
        'channelsProfile.*.channel' => 'required|distinct',
        'channelsProfile.*.capacity' => 'numeric|min:0',
        'channelsProfile.*.weightage' => 'numeric|min:1|max:100'
    ];
    public $messages = [
        'channelsProfile.*.channel.required' => 'Channel in channel profile is mandatory',
        'channelsProfile.*.channel.distinct' => 'Channels in channel profile must be unique',
    ];
    public $belongsTo = [
        'application' => [\Demo\Core\Models\EngineApplication::class, 'key' => 'engine_application_id'],
        'channel' => [ServiceChannel::class]
    ];
    public $jsonable = ['channel_profiles'];

    public function beforeSave()
    {
        // $uniqueProfiles = $channelsProfile->unique('channel');
        /*foreach ($channelsProfile as $channelProfile) {*/
        $validator = Validator::make(['channelsProfile' => $this->channel_profiles], $this->channelProfileRules, $this->messages);
        if ($validator->fails()) {
            throw new \October\Rain\Exception\ValidationException($validator);
        }
        /*}*/
    }
}
