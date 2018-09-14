<?php
namespace Deployer;

/** @noinspection PhpIncludeInspection */
require 'recipe/laravel.php';

// Project name
set('application', 'americancabin.com');

// Project repository
set('repository', 'git@github.com:SturmB/acs.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Overrides
set('default_stage', 'beta');
set('http-user', 'www-data');

// Hosts

host('skyubuntu')
    ->stage('beta')
    ->set('deploy_path', '/var/www/{{application}}');

host('skyweb')
    ->stage('prod')
    ->set('deploy_path', '/var/www/{{application}}');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

// If on the production server, execute a few other tasks.
//before('artisan:config:cache', 'artisan:route:cache');