<?php

namespace Modules\CrudGenerator\Commands\Publish;

use Modules\CrudGenerator\Utils\FileUtil;

class PublishUserCommand extends PublishBaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom.publish:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes Users CRUD file';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->copyViews();
        $this->updateRoutes();
        $this->updateMenu();
        $this->publishUserController();
        if (config('crudgenerator.options.repository_pattern')) {
            $this->publishUserRepository();
        }
        $this->publishCreateUserRequest();
        $this->publishUpdateUserRequest();
    }

    private function copyViews()
    {
        $viewsPath = config('crudgenerator.path.views', resource_path('views/'));
        $templateType = config('crudgenerator.templates', 'adminlte-templates');

        $this->createDirectories($viewsPath.'users');

        $files = $this->getViews();

        foreach ($files as $stub => $blade) {
            $sourceFile = get_template_file_path('scaffold/'.$stub, $templateType);
            $destinationFile = $viewsPath.$blade;
            $this->publishFile($sourceFile, $destinationFile, $blade);
        }
    }

    private function createDirectories($dir)
    {
        FileUtil::createDirectoryIfNotExist($dir);
    }

    private function getViews()
    {
        return [
            'users/create'      => 'users/create.blade.php',
            'users/edit'        => 'users/edit.blade.php',
            'users/fields'      => 'users/fields.blade.php',
            'users/index'       => 'users/index.blade.php',
            'users/show'        => 'users/show.blade.php',
            'users/show_fields' => 'users/show_fields.blade.php',
            'users/table'       => 'users/table.blade.php',
        ];
    }

    private function updateRoutes()
    {
        $path = config('crudgenerator.path.routes', base_path('routes/web.php'));

        $routeContents = file_get_contents($path);

        $routesTemplate = get_template('routes.user', 'CrudGenerator');

        $routeContents .= "\n\n".$routesTemplate;

        file_put_contents($path, $routeContents);
        $this->comment("\nUser route added");
    }

    private function updateMenu()
    {
        $viewsPath = config('crudgenerator.path.views', resource_path('views/'));
        $templateType = config('crudgenerator.templates', 'adminlte-templates');
        $path = $viewsPath.'layouts/menu.blade.php';
        $menuContents = file_get_contents($path);
        $sourceFile = file_get_contents(get_template_file_path('scaffold/users/menu', $templateType));
        $menuContents .= "\n".$sourceFile;

        file_put_contents($path, $menuContents);
        $this->comment("\nUser Menu added");
    }

    private function publishUserController()
    {
        $templateData = get_template('user/user_controller', 'CrudGenerator');
        if (!config('crudgenerator.options.repository_pattern')) {
            $templateData = get_template('user/user_controller_without_repository', 'CrudGenerator');
            $templateData = $this->fillTemplate($templateData);
        }

        $templateData = $this->fillTemplate($templateData);

        $controllerPath = config('crudgenerator.path.controller', app_path('Http/Controllers/'));

        $fileName = 'UserController.php';

        if (file_exists($controllerPath.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }

        FileUtil::createFile($controllerPath, $fileName, $templateData);

        $this->info('UserController created');
    }

    private function publishUserRepository()
    {
        $templateData = get_template('user/user_repository', 'CrudGenerator');

        $templateData = $this->fillTemplate($templateData);

        $repositoryPath = config('crudgenerator.path.repository', app_path('Repositories/'));

        $fileName = 'UserRepository.php';

        FileUtil::createDirectoryIfNotExist($repositoryPath);

        if (file_exists($repositoryPath.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }

        FileUtil::createFile($repositoryPath, $fileName, $templateData);

        $this->info('UserRepository created');
    }

    private function publishCreateUserRequest()
    {
        $templateData = get_template('user/create_user_request', 'CrudGenerator');

        $templateData = $this->fillTemplate($templateData);

        $requestPath = config('crudgenerator.path.request', app_path('Http/Requests/'));

        $fileName = 'CreateUserRequest.php';

        FileUtil::createDirectoryIfNotExist($requestPath);

        if (file_exists($requestPath.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }

        FileUtil::createFile($requestPath, $fileName, $templateData);

        $this->info('CreateUserRequest created');
    }

    private function publishUpdateUserRequest()
    {
        $templateData = get_template('user/update_user_request', 'CrudGenerator');

        $templateData = $this->fillTemplate($templateData);

        $requestPath = config('crudgenerator.path.request', app_path('Http/Requests/'));

        $fileName = 'UpdateUserRequest.php';
        if (file_exists($requestPath.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }

        FileUtil::createFile($requestPath, $fileName, $templateData);

        $this->info('UpdateUserRequest created');
    }

    /**
     * Replaces dynamic variables of template.
     *
     * @param string $templateData
     *
     * @return string
     */
    private function fillTemplate($templateData)
    {
        $templateData = str_replace('$NAMESPACE_CONTROLLER$', config('crudgenerator.namespace.controller'), $templateData);

        $templateData = str_replace('$NAMESPACE_REQUEST$', config('crudgenerator.namespace.request'), $templateData);

        $templateData = str_replace('$NAMESPACE_REPOSITORY$', config('crudgenerator.namespace.repository'), $templateData);
        $templateData = str_replace('$NAMESPACE_USER$', config('auth.providers.users.model'), $templateData);

        return $templateData;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}
