<?php

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('resolve')) {
    /**
     * Resolve a service from the container.
     *
     * @param  string $name
     * @return mixed
     */
    function resolve($name)
    {
        return app($name);
    }
}

if (!function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            } else {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (!function_exists('record_navigation_init')) {

    /**
     * @param string $routeName
     * @param \Illuminate\Database\Eloquent\Model $modelData
     * @return array
     */
    function record_navigation_init(string $routeName, \Illuminate\Database\Eloquent\Model $modelData)
    {
        $nextRecord = $modelData->getNextRecord();
        $previousRecord = $modelData->getPreviousRecord();

        return [
            'next_record' => $nextRecord ? route($routeName, $nextRecord->id) : null,
            'previous_record' => $previousRecord ? route($routeName, $previousRecord->id) : null
        ];
    }
}

if (!function_exists('record_navigation_get_next')) {

    /**
     * @param array $navigationRecord
     * @return mixed
     */
    function record_navigation_get_next(array $navigationRecord)
    {
        return $navigationRecord['next_record'];
    }
}

if (!function_exists('record_navigation_get_previous')) {

    /**
     * @param array $navigationRecord
     * @return mixed
     */
    function record_navigation_get_previous(array $navigationRecord)
    {
        return $navigationRecord['previous_record'];
    }
}
