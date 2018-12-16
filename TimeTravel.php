<?php


class TimeTravel
{
    private $start;
    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function getTravelInfo()
    {
        $diff = $this->start->diff($this->end);
        return $diff->format("Il y a %Y années, %M mois, %D jours, %h heures, %i minutes et %s secondes entre les deux dates");
    }

    public function findDate(int $interval)
    {
        $inte = new DateInterval("PT" . $interval . "S");
        $this->start->sub($inte);
        return $this->start->format("d/m/Y h:i:s");
    }

    public function backToFutureStepByStep($period)
    {

        $result = [];
        $periods = new DatePeriod($this->start, $period , $this->end);

        foreach ($periods as $date)
        {
            $result[] = $date->format("M,d,Y,A,H");
        }

        return $result;
    }
}