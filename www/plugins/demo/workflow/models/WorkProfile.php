<?php namespace Demo\Workflow\Models;

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
    public $table = 'demo_workflow_work_profiles';
    public $incrementing = false;
    public $attachAuditedBy = true;
    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'channels_profile' => 'required',
    ];
    public $channelProfileRules = [
        'channel' => 'required|unique',
        'capacity' => 'min:0',
        'weightage' => 'max:100'
    ];
    public $belongsTo = [
        'application' => [\Demo\Core\Models\EngineApplication::class, 'key' => 'engine_application_id'],
        'channel' => [ServiceChannel::class]
    ];
    public $jsonable = ['channels_profile'];

    public function beforeSave()
    {
        $channelsProfile = collect($this->channels_profile);
        $uniqueProfiles = $channelsProfile->unique('channel');
        $validator = Validator::make($this->channels_profile, $this->channelProfileRules);
        if ($validator->fails()) {
            throw new \October\Rain\Exception\ValidationException($validator);
        }
        if ($uniqueProfiles->count() !== $channelsProfile->count()) {
            throw new ApplicationException('Channels in channel profile must be unique');
        }
    }
}
