<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author chchuy
 */
class Validate {

    public static function Arrayvalidation($tab) {
        $tabBool = Array();
        foreach ($tab as $type => $value) {

            $tabBool[] = Validate::validationParType($value, $type);
        }
        return $tabBool;
    }

    public static function validationParType($value, $type) {
        switch ($type) {
            case 'int':
                filter_var($value, FILTER_VALIDATE_INT) == FALSE ? $validite = FALSE : $validite = TRUE;
                break;
            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL) == FALSE ? $validite = FALSE : $validite = TRUE;
                break;
            case 'boolean':
                return $validite = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                break;
            case 'float':
                return filter_var($value, FILTER_VALIDATE_FLOAT) == FALSE ? $validite = FALSE : $validite = TRUE;
            case 'tel':
                $expression = "#^0[1-9][0-9]{8}$#";
                return preg_match($expression, $value) == FALSE ? $validite = FALSE : $validite = TRUE;
                break;
            default:
                return false;
                break;
        }
        return $validite;
    }

}
