<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PeriodicDonationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Project;
use App\Models\SitePagesDetail;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Response;

class PeriodicDonationController extends AppBaseController
{
    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     *
     * @return Response
     */
    public function index(PeriodicDonationDataTable $periodicDonationDataTable)
    {
        return $periodicDonationDataTable->render('admin.periodicDonation.index');
    }

}
