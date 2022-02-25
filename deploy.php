<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'BatoiPop-1');

// Project repository
set('repository', 'git@github.com:josemu98/BatoiPop-1.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts
host('34.205.118.10')
    ->user('deployer')
    ->identityFile('~/.ssh/server-ssh')
    ->set('deploy_path','/var/www/app-proyecto/html/BatoiPop/public');
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

