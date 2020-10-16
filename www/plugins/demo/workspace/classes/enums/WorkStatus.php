<?php


namespace Demo\Workspace\Classes\Enums;


interface WorkStatus
{
    const INIT = 'init';
    const START = 'start';
    const ASSIGNED = 'assigned';
    const WAITING = 'waiting';
    const FINISHED = 'finished';
    const FAILED = 'failed';
}
