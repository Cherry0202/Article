<?php
/**
 * Created by PhpStorm.
 * User: chisei
 * Date: 2018/11/29
 * Time: 15:22
 */

function delete_form($url, $label = '削除')
{
    $form = Form::open(['method' => 'DELETE', 'url' => $url, 'class' => 'd-inline']);
    $form .= Form::submit($label, ['class' => 'btn btn-danger']);
    $form .= Form::close();

    return $form;
}