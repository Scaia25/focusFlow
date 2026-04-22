<?php
function month_translation($month)
{
    switch ($month) {
        case 1:
            $month_text = "Gennaio";
            break;
        case 2:
            $month_text = "Febbraio";
            break;
        case 3:
            $month_text = "Marzo";
            break;
        case 4:
            $month_text = "Aprile";
            break;
        case 5:
            $month_text = "Maggio";
            break;
        case 6:
            $month_text = "Giugno";
            break;
        case 7:
            $month_text = "Luglio";
            break;
        case 8:
            $month_text = "Agosto";
            break;
        case 9:
            $month_text = "Settembre";
            break;
        case 10:
            $month_text = "Ottobre";
            break;
        case 11:
            $month_text = "Novembre";
            break;
        case 12:
            $month_text = "Dicembre";
            break;
        default:
            $month_text = "Errore";
            break;
    }
    return $month_text;
}
?>