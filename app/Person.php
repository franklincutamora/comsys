<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Person extends Model
{
    /**
     * Converts 2 character code of 
     * civil status into full word
     * in equivalent
     */
    public static function civilStatus($code) {
        switch ($code) {
            case 'si':
                $cstatus = 'Single';
                break;
            case 'ma':
                $cstatus = 'Married';
                break;
            case 'wi':
                $cstatus = 'Widowed';
                break;
            case 'se':
                $cstatus = 'Separated';
                break;
            case 'an':
                $cstatus = 'Annulled';
                break;
            case 'di':
                $cstatus = 'Divorced';
                break;
            default:
                $cstatus = 'Single';
                break;
        }

        return $cstatus;
    }

    /**
     * Return calculated age in years
     * in integer
     * from birth date in date format
     */
    public static function getAge($bday) {
        return Carbon::parse($bday)->age;
    }

    /**
     * Converts date input into
     * database date format
     */
    public static function dateInputToDb($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public static function getFieldName($field) {
        switch ($field) {
            case 'fname':
                $fieldName = 'first name';
                break;
            case 'lname':
                $fieldName = 'last name';
                break;
            case 'mname':
                $fieldName = 'middle name';
                break;
            case 'cstatus':
                $fieldName = 'civil status';
                break;
            case 'occupation':
                $fieldName = 'occupation';
                break;
            case 'nname':
                $fieldName = 'nickname';
                break;
            case 'asc':
                $fieldName = 'ascending';
                break;
            case 'desc':
                $fieldName = 'descending';
                break;
            default:
                $fieldName = 'first name';
                break;
        }

        return $fieldName;
    }
}