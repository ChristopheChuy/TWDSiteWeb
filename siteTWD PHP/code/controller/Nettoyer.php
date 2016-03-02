<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nettoyer
 *
 * @author chchuy
 */
class Nettoyer {

    public static function Nettoyage($tab) {
        $tabNettoye = Array();
        foreach ($tab as $type => $value) {
            switch ($type) {
                case 'int':
                    $tabNettoye[] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                    break;
                case 'email':
                    $tabNettoye[] = filter_var($value, FILTER_SANITIZE_EMAIL);
                    break;
                case 'float':
                    $tabNettoye[] = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
                case 'string':
                    $tabNettoye[] = filter_var($value, FILTER_SANITIZE_STRING);
                    break;
                
                default:

                    break;
            }
        }
        return $tabNettoye;
    }

    public static function NettoyageParType($value, $type) {
        switch ($type) {
            case 'int':
                return filter_var($value, FILTER_SANITIZE_NUMBER_INT);

            case 'email':
                return filter_var($value, FILTER_SANITIZE_EMAIL);

            case 'float':
                return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
            case 'string':
                return filter_var($value, FILTER_SANITIZE_STRING);
            
            default:
                return filter_var($value, FILTER_SANITIZE_STRING);
                break;
        }
    }

}
