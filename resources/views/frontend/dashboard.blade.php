@extends('frontend.layouts.layout')
@section('mainClass', 'bg-white')
@section('content')
<section class="spacing-y dashboard-section">
    <div class="container">
        <ul class="nav nav-tabs hire-tablist" id="dashboardtab" role="tablist">
            <li class="nav-item pe-md-5 pe-4 pb-lg-0 pb-3">
                <a href="javascript:void()" aria-controls="activeproposal" class="nav-link p-2 active text-secondary"
                    id="hire-tab1" data-bs-toggle="tab" data-bs-target="#activeproposal">Active Proposal</a>
            </li>
            <li class="nav-item pe-md-5 pe-4 pb-lg-0 pb-3">
                <a href="javascript:void()" aria-controls="activeproject" class="nav-link p-2 text-secondary"
                    id="hire-tab2" data-bs-toggle="tab" data-bs-target="#activeproject">Active Project</a>
            </li>
            <li class="nav-item pe-md-5 pe-4 pb-lg-0 pb-3">
                <a href="javascript:void()" aria-controls="completeproject"
                    class="nav-link p-2  text-secondary" id="hire-tab3" data-bs-toggle="tab"
                    data-bs-target="#completeproject">Completed Project</a>
            </li>
            <li class="nav-item pe-md-5 pe-4 pb-lg-0 pb-3">
                <a href="javascript:void()" aria-controls="totalticket" class="nav-link p-2 text-secondary"
                    id="hire-tab4" data-bs-toggle="tab" data-bs-target="#totalticket">Total Ticket</a>
            </li>
            <li class="nav-item pb-lg-0 pb-3 ms-auto me-0">
                <a href="#" class="btn btn-primary"
                    >New Project</a>
            </li>
        </ul>
        <div class="tab-content mt-5" id="dashboardtabContent">
            <div class="tab-pane fade active show" id="activeproposal">
                @if($quotes)
                @foreach($quotes as $quote)
                <div class="bg-light p-md-5 p-4 mb-md-5 mb-4 rounded-4 position-relative">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-secondary mb-md-3">{{ $quote['title'] }}</h2>
                            <p>{{ $quote['description'] }}</p>
                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Project Timeline:</span>
                                {{ $quote['timeline'] }}</h5>
                                    <h5 class="mb-3"><span class="text-secondary">Payment Milestone:</span>
                                        {{ $quote['payment_type'] }}</h5>

                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Experience: </span> {{ $quote['experience_level'] }}</h5>
                            <h5 class="mb-3"><span class="text-secondary">Attached File:</span> <a href="#"><u>
                                        View Documents</u></a></h5>
                        </div>
                        @if($quote['hired_resources'])
                        <div class="col-12 mb-md-5 mb-3">
                            <h5 class="text-secondary mb-3"><span>Hire Resources</span></h5>
                            <div class="resouce-slider">
                                @php
                                $hiredResources = json_decode($quote['hired_resources']['resources'], true);
                                @endphp
                                @foreach($hiredResources as $resource)
                                <div>
                                    <div class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                            viewBox="0 0 102 102" fill="none">
                                            <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                        </svg>
                                        <div class="align-self-center ms-4 flex-fill">
                                            <div class="float-lg-end">
                                                <p class="mb-0">5 Years</p>
                                            </div>
                                            <h4 class="mb-0 fw-semibold text-secondary">{{ $resource['name'] }}</h4>
                                            <p class="mb-0 text-muted">{{ $resource['designation'] }}</p>
                                            <div class="mb-0 text-muted d-flex align-items-center input-container"><span>Hours/ Day: </span> 
                                                <input type="number" class="form-control border bg-white w-25 mx-2 numberfield" disabled value="{{ $resource['hours'] }}" min="1" max="8">
                                                <a href="javascript:voic()" title="Edit"  data-bs-toggle="tooltip" data-bs-placement="bottom" class="edit">
                                                    <i class="fas fa-edit ms-2"></i>
                                                </a>
                                                <a href="javascript:void()" class="save" title="save" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <i class="fas fa-save  ms-2"></i>
                                                </a>
                                            </div>
                                            <div class="mb-0 text-muted d-flex align-items-center input-container"><span>Months: </span>
                                                <input type="number" class="form-control border bg-white w-25 mx-2 numberfield" disabled value="{{ $resource['months'] }}" min="1" max="8">
                                                <a href="javascript:voic()" title="Edit"  data-bs-toggle="tooltip" data-bs-placement="bottom" class="edit">
                                                    <i class="fas fa-edit ms-2"></i>
                                                </a>
                                                <a href="javascript:void()" class="save" title="save" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <i class="fas fa-save  ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        @endif
                        <div class="col-12 d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-3">Send Message</a>
                            <a href="#" class="fw-semibold"><u> Click here to complete process</u></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="tab-pane fade" id="activeproject">
                <div class="bg-light p-md-5 p-4 mb-md-5 mb-4 rounded-4 position-relative">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-secondary mb-md-3">House No9 Digital Solution</h2>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Project Timeline:</span>
                                < 3 Months</h5>
                                    <h5 class="mb-3"><span class="text-secondary">Payment Milestone:</span>
                                        Weekly</h5>

                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Experience: </span> Expert</h5>
                            <h5 class="mb-3"><span class="text-secondary">All Documents:</span> <a href="#"><u>
                                        View Documents</u></a></h5>
                        </div>
                        <div class="col-12 mb-md-5 mb-3">
                            <h5 class="text-secondary mb-3"><span>Hire Resources</span></h5>
                            <div class="resouce-slider">
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-3">Send Message</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#generateticket">Generate Ticket</a>
                            <a href="#" class="btn btn-outline-primary ms-3">Order Summary</a>
                            <a href="#" class="ms-auto me-0"><u>Hire More Developer</u></a>
                        </div>
                    </div>
                    <div class="project-status">
                        <span class="text-secondary">Active</span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="completeproject">
                <div class="bg-light p-md-5 p-4 mb-md-5 mb-4 rounded-4 position-relative">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-secondary mb-md-3">House No9 Digital Solution</h2>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Project Timeline:</span>
                                < 3 Months</h5>
                                    <h5 class="mb-3"><span class="text-secondary">Payment Milestone:</span>
                                        Weekly</h5>

                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Experience: </span> Expert</h5>
                            <h5 class="mb-3"><span class="text-secondary">All Documents:</span> <a href="#"><u>
                                        View Documents</u></a></h5>
                        </div>
                        <div class="col-12 mb-md-5 mb-3">
                            <h5 class="text-secondary mb-3"><span>Hire Resources</span></h5>
                            <div class="resouce-slider">
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                                <a href="#" class="text-secondary">Hire Resource again</a>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-3">Send Message</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#generateticket">Generate Ticket</a>
                        </div>
                    </div>
                    <div class="project-status">
                        <span class="text-success">Completed</span>
                    </div>
                </div>
                <div class="bg-light p-md-5 p-4 mb-md-5 mb-4 rounded-4 position-relative">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-secondary mb-md-3">House No9 Digital Solution</h2>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                            <p>Quisque gravida ac tortor quis lacinia. Ut volutpat nisi at consequat
                                euismod. Integer facilisis arcu sit amet quam sodales, eget facilisis
                                lectus porttitor. In lobortis tristique mi sed varius. Donec mi libero
                            </p>
                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Project Timeline:</span>
                                < 3 Months</h5>
                                    <h5 class="mb-3"><span class="text-secondary">Payment Milestone:</span>
                                        Weekly</h5>

                        </div>
                        <div class="col-lg-4 my-3">
                            <h5 class="mb-3"><span class="text-secondary">Experience: </span> Expert</h5>
                            <h5 class="mb-3"><span class="text-secondary">All Documents:</span> <a href="#"><u>
                                        View Documents</u></a></h5>
                        </div>
                        <div class="col-12 mb-md-5 mb-3">
                            <h5 class="text-secondary mb-3"><span>Hire Resources</span></h5>
                            <div class="resouce-slider">
                                <div>
                                    <div
                                        class="d-flex align-self-center p-4 bg-light-dark rounded-4 me-3">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102"
                                                viewBox="0 0 102 102" fill="none">
                                                <circle cx="51" cy="51" r="51" fill="#6F6F6F" />
                                            </svg>
                                            <div class="align-self-center ms-4 flex-fill">
                                                <h4 class="mb-0 fw-semibold text-secondary">John Doe</h4>
                                                <p class="mb-0 text-muted">Frontend developer</p>
                                                <a href="#" class="text-secondary">Hire Resource again</a>
                                            </div>
                                        </div>
                                        <div class="float-lg-end align-self-start">
                                            <p class="mb-0">5 Years</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-3">Send Message</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#generateticket">Generate Ticket</a>
                        </div>
                    </div>
                    <div class="project-status">
                        <span class="text-success">Completed</span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="totalticket">
                <div class="table-responsive">
                    <table class="table border ticket-table table-borderless">
                        <thead>
                            <tr>
                                <th valign="middle">Ticket Id</th>
                                <th valign="middle">Ticket Description</th>
                                <th valign="middle">Status</th>
                                <th valign="middle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="14%" valign="middle"><strong> #0001</strong></td>
                                <td width="60%" valign="middle">Lorem ipsum dolor amet ipsuasjh </td>
                                <td width="13%" valign="middle"><span class="text-success active"><strong>
                                            Active</strong></span></td>
                                <td width="13%" valign="middle">
                                    <a href="#" class="btn btn-secondary d-block">View Ticket</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="14%" valign="middle"><strong> #0002</strong></td>
                                <td width="60%" valign="middle">Lorem ipsum dolor amet ipsuasjh </td>
                                <td width="13%" valign="middle"><span class="text-warning active"><strong> In
                                            Progress</strong></span></td>
                                <td width="13%" valign="middle">
                                    <a href="#" class="btn btn-secondary d-block">View Ticket</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="14%" valign="middle"><strong> #0003</strong></td>
                                <td width="60%" valign="middle">Lorem ipsum dolor amet ipsuasjh </td>
                                <td width="13%" valign="middle"><span class="text-success active"><strong>
                                            Completed</strong></span></td>
                                <td width="13%" valign="middle">
                                    <a href="#" class="btn btn-secondary d-block">View Ticket</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="14%" valign="middle"><strong> #0004</strong></td>
                                <td width="60%" valign="middle">Lorem ipsum dolor amet ipsuasjh </td>
                                <td width="13%" valign="middle"><span class="text-danger active"><strong>
                                            Closed</strong></span></td>
                                <td width="13%" valign="middle">
                                    <a href="#" class="btn btn-secondary d-block">View Ticket</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop