<?php
/**
 * Created by PhpStorm.
 * User: kaantsd
 * Date: 12/10/16
 * Time: 21:45
 */


/**
 * @param $path
 * @param $request
 * @param string $active
 * @return string
 */
function setActive($path, \Illuminate\Http\Request $request, $active = 'active')
{
    return $request->path() == $path ? $active : '';
}
