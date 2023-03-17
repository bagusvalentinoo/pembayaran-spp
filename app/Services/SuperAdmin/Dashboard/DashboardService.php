<?php

namespace App\Services\SuperAdmin\Dashboard;

interface DashboardService
{
    /**
     * Get Amount SD Schools
     *
     * @return mixed
     */
    public function getAmountSDSchools(): mixed;

    /**
     * Get Amount SMP Schools
     *
     * @return mixed
     */
    public function getAmountSMPSchools(): mixed;

    /**
     * Get Amount SMA Schools
     *
     * @return mixed
     */
    public function getAmountSMASchools(): mixed;

    /**
     * Get Amount SMP Schools
     *
     * @return mixed
     */
    public function getAmountSMKSchools(): mixed;

    /**
     * Get Amount Admins
     *
     * @return int
     */
    public function getAmountAdmins(): int;
}
