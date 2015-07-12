<?php
/**
 * Created by PhpStorm.
 * User: Floca
 * Date: 11/07/15
 * Time: 20:27
 */

class Calendar {

    // ["0" => ["date" => "2015-10-02", "title"=>"Titre", "color" => "danger", "link" => ""]
    // ["1" => ["date" => "2015-11-23", "title"=>"Titre2", "color" => "danger", "link" => ""]
    // ["2" => ["date" => "2015-09-12", "title"=>"Titre3", "color" => "danger", "link" => ""]
    // ["3" => ["date" => "2015-10-12", "title"=>"Titre4", "color" => "danger", "link" => ""]

    static function drawCalendar($month, $year, $event = [])
    {

        $curday = date("d");
        $curmonth = date("m");
        $curyear = date("Y");
        $days = cal_days_in_month(CAL_GREGORIAN,$month,$year); // Nombre de jours
        $lastmonth = date("t", mktime(0,0,0,$month-1,1,$year)); // Les derniers jours du mois avant
        $start = date("N", mktime(0,0,0,$month,1,$year)); // Début du mois demandé
        $finish = date("N", mktime(0,0,0,$month,$days,$year)); // Dernier jour du mois
        $laststart = $start - 1;

        $counter = 1;
        $nextMonthCounter = 1;

        if($start > 5)
            $rows = 6;
        else
            $rows = 5;

        echo '<table id="calendar" class="table table-bordered">
                <thead>
                <tr>
                    <th>Lun.</th>
                    <th>Mar.</th>
                    <th>Mer.</th>
                    <th>Jeu.</th>
                    <th>Ven.</th>
                    <th>Sam.</th>
                    <th>Dim.</th>
                </tr>
                </thead>
                <tbody>';
        for($i = 1; $i <= $rows; $i++)
        {
            echo '<tr class="week">';
            for($x = 1; $x <= 7; $x++)
            {
                $class ="";
                $tclass = "";
                $button = "";

                if(($counter - $start) < 0)
                {
                    $date = ($lastmonth - $laststart) + $counter;
                    $class = 'class="active"';
                }
                else if(($counter - $start) >= $days)
                {
                    $date = $nextMonthCounter;
                    $nextMonthCounter++;
                    $class = 'class="active"';
                }
                else
                {
                    $date = $counter - $start + 1;
                    if($curday == $date && $curmonth == $month && $curyear == $year)
                        $tclass = 'class="badge badge-default"';
                    $ldate = $year . '-'.str_pad($month, 2, 0, STR_PAD_LEFT) .'-'.str_pad($date, 2, 0, STR_PAD_LEFT);
                    foreach ($event as $key => $val)
                    {
                        if ($val['date'] === $ldate)
                            $button .= '<a href="'.$val["link"].'" class="label label-primary">'.$val["title"].'</a>';

                    }

                }


                echo '<td '.$class.'><div><span '.$tclass.'>'.$date.'</span></div>'.$button.'</td>';

                $counter++;
            }
            echo '</tr>';
        }
        echo "</table>";
    }

}


