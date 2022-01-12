<?php

namespace Deployer;

if (file_exists('.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

require 'recipe/common.php';

set('application', $_ENV['APP_NAME']);
set('timezone', 'Europe/Amsterdam');
set('repository', 'git@github.com:verdant-studio/blue-circle.git');
set('keep_releases', 3);
set('git_tty', true);
set('allow_anonymous_stats', false);
set('default_stage', 'production');
set('shared_files', [
    '.env',
]);
set('shared_dirs', [
    'storage/app/analytics',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/logs',
    'storage/framework/views',
]);

// Hosts
host('verdant.studio')
    ->stage('production')
    ->user($_ENV['DEPLOYER_PROD_USER'])
    ->port($_ENV['DEPLOYER_PROD_PORT'])
    ->set('deploy_path', '~/www/verdant.studio/deployer')
    ->set('branch', 'master')
    ->set('http_user', $_ENV['DEPLOYER_PROD_USER'])
    ->set('domain', 'verdant.studio')
    ->set('composer_options', 'install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader')
    ->set('writable_mode', 'chmod')
    ->set('writable_use_sudo', true)
    ->set('ssh_multiplexing', true);

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:assets',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success',
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

/**
 * Compile assets on production
 */
task('deploy:assets', function () {
    runLocally('npm install && npm run prod');
    upload('./public', '{{release_path}}/.');
})->desc('Generating assets and uploading them to server');
