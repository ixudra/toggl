<?php namespace Ixudra\Toggl\Traits;


use Carbon\Carbon;

trait DetailedReportUtilityTrait {

    public function detailedThisWeek(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfWeek()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->endOfWeek()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastWeek(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedThisMonth(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfMonth()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->endOfMonth()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastMonth(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedThisYear(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->startOfYear()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->endOfYear()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastYear(array $data = array())
    {
        $data[ 'since' ] = Carbon::now()
            ->subYear()
            ->startOfYear()
            ->toDateString();
        $data[ 'until' ] = Carbon::now()
            ->subYear()
            ->endOfYear()
            ->toDateString();

        return $this->detailed( $data );
    }

}
