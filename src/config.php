<?php

return [

    'environments' => explode(',', env('FUTURE_ENVS', 'local,development')),

    'remove_during_tests' => env('FUTURE_IN_TEST', false) === false,

];
