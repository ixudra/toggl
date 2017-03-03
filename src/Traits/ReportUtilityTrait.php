<?php namespace Ixudra\Toggl\Traits;


use Carbon\Carbon;

trait ReportUtilityTrait {

    public function summaryThisWeek(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfWeek()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        return $this->summary( $data );
    }

    public function summaryLastWeek(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfWeek()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        return $this->summary( $data );
    }

    public function summaryThisMonth(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfMonth()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->endOfMonth()
            ->toDateString();

        return $this->summary( $data );
    }

    public function summaryLastMonth(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        return $this->summary( $data );
    }

    public function summaryThisYear(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfYear()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->endOfYear()
            ->toDateString();

        return $this->summary( $data );
    }

    public function summaryLastYear(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->subYear()
            ->startOfYear()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subYear()
            ->endOfYear()
            ->toDateString();

        return $this->summary( $data );
    }

}