<?php

$profile = require __DIR__.'/profile.php';

return [
    'title' => $profile['hero.titulo'],
    'emphasis' => $profile['hero.enfasis'],
    'intro' => $profile['persona.presentacion'],
];
