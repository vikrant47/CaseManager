<?php


namespace Demo\Workflow\Classes\Enums;


interface WorkStatus
{
    const INIT = 'init';
    const START = 'start';
    const ASSIGNED = 'assigned';
    const WAITING = 'waiting';
    const COMPLETED = 'completed';
    const FAILED = 'failed';
}
