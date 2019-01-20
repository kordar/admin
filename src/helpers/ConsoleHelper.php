<?php
namespace kordar\yak\helpers;

class ConsoleHelper
{
    public static function generateSuper($username, $password, $email = '')
    {
        $admin = new \kordar\yak\models\admin\User();
        $email = empty($email) ? $username . '@yak.com' : $email;
        $admin->username = $username;
        $admin->email = $email;
        $admin->setPassword($password);
        $admin->generateAuthKey();
        $admin->type = 9;
        return $admin->save();
    }

    public static function autoPermissions($dirname = '', $module = '', $exceptCtrl = ['yak', 'auth'])
    {
        $actions = [];
        $items = [];

        // Simple way to get all files in a directory
        $files = new \FilesystemIterator($dirname);

        foreach($files as $file)
        {
            $controller = $file->getFilename();
            $match = [];
            preg_match("/([a-zA-Z0-9]+)Controller\.php/", $controller, $match);
            $class = lcfirst($match[1]);

            if (in_array($class, $exceptCtrl)) {
                continue;
            }

            $class = preg_replace_callback('/[A-Z]/', function($mclass){
                return '-' . strtolower($mclass[0]);
            }, $class);

            $namespace = empty($module) ? $class : $module . '/' . $class;

            array_push($actions, $namespace . '/*');

            $document = new \SplFileObject($file->getPathname());

            foreach($document as $line) {

                if (preg_match('/@item (.+)/', $line, $_item)) {
                    $itemArr = explode(':', $_item[1]);
                    $key = $namespace . '/' . trim($itemArr[0]);
                    $items[$key] = trim($itemArr[1]);
                }

                if (preg_match('/public function action([a-zA-Z0-9_]+)/', $line, $_action)) {
                    if (preg_match('/[A-Z]/', $_action[1])) {
                        $str = lcfirst($_action[1]);
                        $actions[] = $namespace . '/' . preg_replace_callback('/[A-Z]/', function($matches){
                                return '-' . strtolower($matches[0]);
                            }, $str);
                    }
                }

            }
        }

        $auth = \Yii::$app->authManager;

        //$auth->removeAllPermissions();

        foreach ($actions as $action) {
            $obj = $auth->createPermission($action);
            $obj->description = isset($items[$action]) ? $items[$action] : $action;
            if (!$auth->getPermission($action)) {
                $auth->add($obj);
            } else {
                $auth->update($action, $obj);
            }
        }

    }
}