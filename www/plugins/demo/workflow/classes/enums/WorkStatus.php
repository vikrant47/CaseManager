<?php


namespace Demo\Workflow\Classes\Enums;


interface WorkStatus
{
    const INIT = 'init';
    const START = 'start';
    const ASSIGNED = 'assigned';
    const WAITING = 'waiting';
    const FINISHED = 'finished';
    const FAILED = 'failed';
}
