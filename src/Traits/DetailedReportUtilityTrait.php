<?php namespace Ixudra\Toggl\Traits;


use Carbon\Carbon;

trait DetailedReportUtilityTrait {

    public function detailedToday(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->startOfDay()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->endOfDay()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedYesterday(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->subDay()
            ->startOfDay()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->subDay()
            ->endOfDay()
            ->toDateString();

        return $this->detailed( $data );
    }
    
    public function detailedThisWeek(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->startOfWeek()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->endOfWeek()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastWeek(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedThisMonth(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->startOfMonth()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->endOfMonth()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastMonth(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->subMonth()
            ->startOfMonth()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->subMonth()
            ->endOfMonth()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedThisYear(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->startOfYear()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->endOfYear()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedLastYear(array $data = array())
    {
        $data[ 'start_date' ] = Carbon::now()
            ->subYear()
            ->startOfYear()
            ->toDateString();
        $data[ 'end_date' ] = Carbon::now()
            ->subYear()
            ->endOfYear()
            ->toDateString();

        return $this->detailed( $data );
    }

    public function detailedBetween(Carbon $from, Carbon $to, $offset = 1, array $data = array())
    {
        $data[ 'start_date' ] = $from
            ->toDateString();
        $data[ 'end_date' ] = $to
            ->toDateString();
        $data[ 'first_row_number' ] = $offset;

        return $this->detailed( $data );
    }

}
