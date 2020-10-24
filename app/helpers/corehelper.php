<?php

use App\App\App;
use App\Models\Item;

if( !function_exists("view") )
{
    /**
     * @param string $view_title
     * @param array $data
     */
    function view(string $view_title, $data = [])
    {
        extract(($data));

        $view = basename("views") . "/" . $view_title;

        if (file_exists($view)) {
            require "$view";
        } else {
            require "views/errors/404.php";
        }

    }
}

if( !function_exists("getModel") )
{
    /**
     * @param string $model_name
     */
    function getModel(string $model_name)
    {

        $model = dirname( dirname(__FILE__ ) ) . "/models/$model_name.php";

        if (file_exists($model)) {
            require_once "$model";
            $items = App::get('database');
            return $items;
        } else {
            dd("ERROR: $model_name Model does not exits");
        }

    }
}

if( !function_exists("getView") )
{
    /**
     * @param string $view_title
     * @param array $data
     */
    function getView(string $view_title, $data = [])
    {
        extract(($data));

        $view = basename("views") . "/" . $view_title . ".php";

        if (file_exists($view)) {
            require_once "$view";
        } else {
            dd("ERROR: $view_title View does not exits");
        }

    }
}

if( !function_exists("getController") )
{
    /**
     * @param string $controller_title
     */
    function getController(string $controller_title)
    {
        $controller = basename("app/controllers") . "/" . $controller_title . ".php";

        if (file_exists($controller)) {
            require_once "$controller";
        } else {
            dd("ERROR: $controller Controller does not exits");
        }

    }
}

if ( !function_exists('recursively_include_all_files') )
{
    /**
     * @param $folder
     */
    function recursively_include_all_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php')
                {
                    require $it->key();
                }

                $it->next();
            }
        }

        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if ( !function_exists('getDirContents') )
{
    /**
     * @param $dir
     * @param array $results
     * @return array|mixed
     */
    function getDirContents($dir, &$results = array())
    {
        $files = scandir($dir);

        foreach($files as $key => $value) {
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);

            if(!is_dir($path))
            {
                $results[] = $path;
            }

            else if($value != "." && $value != "..") {
                getDirContents($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
}

if ( !function_exists('core_helper_extend_timeout_time') )
{
    function core_helper_extend_timeout_time()
    {
        # Override default php.ini max excution time
        set_time_limit(180);

        ini_set('max_execution_time', 0);
        ini_set('max_input_time ', 0);
        ini_set('memory_limit', '1024M');
        ini_set('post_max_size', '1024M');
        ini_set('upload_max_filesize', '1024M');
        ini_set('client_max_body_size', '1024M');
    }
}

if( !function_exists("redirect") )
{
    /**
     * @param string $variable
     */
    function redirect(string $variable)
    {
        header("Location: /{$variable}");
    }
}