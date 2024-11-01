<?php

namespace TheBooking\Bus\Commands;

use TheBooking\Bus\Command;

defined('ABSPATH') || exit;

/**
 * DeletePastReservations
 *
 * @package TheBooking\Classes
 */
class DeletePastReservations implements Command
{
    /**
     * @var int
     */
    private $age;

    public function __construct($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getData()
    {
        return $this->age;
    }
}