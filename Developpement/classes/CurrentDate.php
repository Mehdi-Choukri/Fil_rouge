<?php

class CurrentDate{
    public static function getDayOfTheWeek()
    {
        $date = date('l');
        $dateInFrench = '';
        switch($date)
        {
            case 'Monday' : 
                $dateInFrench = 'Lundi' ;
            break;
            case 'Tuesday' : 
                $dateInFrench = 'Mardi' ;
            break;
            case 'Wednesday' : 
                $dateInFrench = 'Mercredi' ;
            break;
            case 'Thursday' : 
                $dateInFrench = 'Jeudi' ;
            break;
            case 'Friday' : 
                $dateInFrench = 'Vendredi' ;
            break;
            case 'Saturday' : 
                $dateInFrench = 'Samedi';
            break;
            case 'Sunday' : 
                $dateInFrench = 'Dimanche' ;
            break;

        }
        return $dateInFrench;

    }
    public static  function getMonth()
    {
        $month = date('F');
        $monthInFrench = '';
        switch($month)
        {
            case 'January' : 
                $monthInFrench = 'janvier' ;
            break;
            case 'February' : 
                $monthInFrench = 'février' ;
            break;
            case 'March' : 
                $monthInFrench = 'mars' ;
            break;
            case 'April' : 
                $monthInFrench = 'avril' ;
            break;
            case 'May' : 
                $monthInFrench = 'mai' ;
            break;
            case 'June' : 
                $monthInFrench = 'juin';
            break;
            case 'July' : 
                $monthInFrench = 'juillet' ;
            break;
            case 'August' : 
                $monthInFrench = 'août' ;
            break;
            case 'September' : 
                $monthInFrench = 'septembre' ;
            break;
            case 'October' : 
                $monthInFrench = 'octobre' ;
            break;
            case 'November' : 
                $monthInFrench = 'novembre';
            break;
            case 'December' : 
                $monthInFrench = 'décembre' ;
            break;

        }
        return $monthInFrench;

    }
    public static function getDate()
    {
        return date('d');
    }
    public static function getYear()
    {
        return date('Y');
    }
}



?>